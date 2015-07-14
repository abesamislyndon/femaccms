<?php
/**
 * WooCommerce API Orders Class
 *
 * Handles requests to the /orders endpoint
 *
 * @author      WooThemes
 * @category    API
 * @package     WooCommerce/API
 * @since       2.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class WC_API_Orders extends WC_API_Resource {

	/** @var string $base the route base */
	protected $base = '/orders';

	/** @var string $post_type the custom post type */
	protected $post_type = 'shop_order';

	/**
	 * Register the routes for this class
	 *
	 * GET|POST /orders
	 * GET /orders/count
	 * GET|PUT|DELETE /orders/<id>
	 * GET /orders/<id>/notes
	 *
	 * @since 2.1
	 * @param array $routes
	 * @return array
	 */
	public function register_routes( $routes ) {

		# GET|POST /orders
		$routes[ $this->base ] = array(
			array( array( $this, 'get_orders' ),     WC_API_Server::READABLE ),
			array( array( $this, 'create_order' ),   WC_API_Server::CREATABLE | WC_API_Server::ACCEPT_DATA ),
		);

		# GET /orders/count
		$routes[ $this->base . '/count' ] = array(
			array( array( $this, 'get_orders_count' ), WC_API_Server::READABLE ),
		);

		# GET /orders/statuses
		$routes[ $this->base . '/statuses' ] = array(
			array( array( $this, 'get_order_statuses' ), WC_API_Server::READABLE ),
		);

		# GET|PUT|DELETE /orders/<id>
		$routes[ $this->base . '/(?P<id>\d+)' ] = array(
			array( array( $this, 'get_order' ),  WC_API_Server::READABLE ),
			array( array( $this, 'edit_order' ), WC_API_Server::EDITABLE | WC_API_Server::ACCEPT_DATA ),
			array( array( $this, 'delete_order' ), WC_API_Server::DELETABLE ),
		);

		# GET|POST /orders/<id>/notes
		$routes[ $this->base . '/(?P<order_id>\d+)/notes' ] = array(
			array( array( $this, 'get_order_notes' ), WC_API_Server::READABLE ),
			array( array( $this, 'create_order_note' ), WC_API_SERVER::CREATABLE | WC_API_Server::ACCEPT_DATA ),
		);

		# GET|PUT|DELETE /orders/<order_id>/notes/<id>
		$routes[ $this->base . '/(?P<order_id>\d+)/notes/(?P<id>\d+)' ] = array(
			array( array( $this, 'get_order_note' ), WC_API_Server::READABLE ),
			array( array( $this, 'edit_order_note' ), WC_API_SERVER::EDITABLE | WC_API_Server::ACCEPT_DATA ),
			array( array( $this, 'delete_order_note' ), WC_API_SERVER::DELETABLE ),
		);

		# GET|POST /orders/<order_id>/refunds
		$routes[ $this->base . '/(?P<order_id>\d+)/refunds' ] = array(
			array( array( $this, 'get_order_refunds' ), WC_API_Server::READABLE ),
			array( array( $this, 'create_order_refund' ), WC_API_SERVER::CREATABLE | WC_API_Server::ACCEPT_DATA ),
		);

		# GET|PUT|DELETE /orders/<order_id>/refunds/<id>
		$routes[ $this->base . '/(?P<order_id>\d+)/refunds/(?P<id>\d+)' ] = array(
			array( array( $this, 'get_order_refund' ), WC_API_Server::READABLE ),
			array( array( $this, 'edit_order_refund' ), WC_API_SERVER::EDITABLE | WC_API_Server::ACCEPT_DATA ),
			array( array( $this, 'delete_order_refund' ), WC_API_SERVER::DELETABLE ),
		);

		return $routes;
	}

	/**
	 * Get all orders
	 *
	 * @since 2.1
	 * @param string $fields
	 * @param array $filter
	 * @param string $status
	 * @param int $page
	 * @return array
	 */
	public function get_orders( $fields = null, $filter = array(), $status = null, $page = 1 ) {

		if ( ! empty( $status ) ) {
			$filter['status'] = $status;
		}

		$filter['page'] = $page;

		$query = $this->query_orders( $filter );

		$orders = array();

		foreach ( $query->posts as $order_id ) {

			if ( ! $this->is_readable( $order_id ) ) {
				continue;
			}

			$orders[] = current( $this->get_order( $order_id, $fields, $filter ) );
		}

		$this->server->add_pagination_headers( $query );

		return array( 'orders' => $orders );
	}


	/**
	 * Get the order for the given ID
	 *
	 * @since 2.1
	 * @param int $id the order ID
	 * @param array $fields
	 * @param array $filter
	 * @return array
	 */
	public function get_order( $id, $fields = null, $filter = array() ) {

		// ensure order ID is valid & user has permission to read
		$id = $this->validate_request( $id, $this->post_type, 'read' );

		if ( is_wp_error( $id ) ) {
			return $id;
		}

		// Get the decimal precession
		$dp = ( isset( $filter['dp'] ) ? $filter['dp'] : 2 );

		$order = wc_get_order( $id );

		$order_post = get_post( $id );

		$order_data = array(
			'id'                        => $order->id,
			'order_number'              => $order->get_order_number(),
			'created_at'                => $this->server->format_datetime( $order_post->post_date_gmt ),
			'updated_at'                => $this->server->format_datetime( $order_post->post_modified_gmt ),
			'completed_at'              => $this->server->format_datetime( $order->completed_date, true ),
			'status'                    => $order->get_status(),
			'currency'                  => $order->get_order_currency(),
			'total'                     => wc_format_decimal( $order->get_total(), 2 ),
			'subtotal'                  => wc_format_decimal( $order->get_subtotal(), 2 ),
			'total_line_items_quantity' => $order->get_item_count(),
			'total_tax'                 => wc_format_decimal( $order->get_total_tax(), 2 ),
			'total_shipping'            => wc_format_decimal( $order->get_total_shipping(), 2 ),
			'cart_tax'                  => wc_format_decimal( $order->get_cart_tax(), 2 ),
			'shipping_tax'              => wc_format_decimal( $order->get_shipping_tax(), 2 ),
			'total_discount'            => wc_format_decimal( $order->get_total_discount(), 2 ),
			'shipping_methods'          => $order->get_shipping_method(),
			'payment_details' => array(
				'method_id'    => $order->payment_method,
				'method_title' => $order->payment_method_title,
				'paid'         => isset( $order->paid_date ),
			),
			'billing_address' => array(
				'first_name' => $order->billing_first_name,
				'last_name'  => $order->billing_last_name,
				'company'    => $order->billing_company,
				'address_1'  => $order->billing_address_1,
				'address_2'  => $order->billing_address_2,
				'city'       => $order->billing_city,
				'state'      => $order->billing_state,
				'postcode'   => $order->billing_postcode,
				'country'    => $order->billing_country,
				'email'      => $order->billing_email,
				'phone'      => $order->billing_phone,
			),
			'shipping_address' => array(
				'first_name' => $order->shipping_first_name,
				'last_name'  => $order->shipping_last_name,
				'company'    => $order->shipping_company,
				'address_1'  => $order->shipping_address_1,
				'address_2'  => $order->shipping_address_2,
				'city'       => $order->shipping_city,
				'state'      => $order->shipping_state,
				'postcode'   => $order->shipping_postcode,
				'country'    => $order->shipping_country,
			),
			'note'                      => $order->customer_note,
			'customer_ip'               => $order->customer_ip_address,
			'customer_user_agent'       => $order->customer_user_agent,
			'customer_id'               => $order->get_user_id(),
			'view_order_url'            => $order->get_view_order_url(),
			'line_items'                => array(),
			'shipping_lines'            => array(),
			'tax_lines'                 => array(),
			'fee_lines'                 => array(),
			'coupon_lines'              => array(),
		);

		// add line items
		foreach ( $order->get_items() as $item_id => $item ) {

			$product     = $order->get_product_from_item( $item );
			$product_id  = null;
			$product_sku = null;

			// Check if the product exists.
			if ( is_object( $product ) ) {
				$product_id  = ( isset( $product->variation_id ) ) ? $product->variation_id : $product->id;
				$product_sku = $product->get_sku();
			}

			$meta = new WC_Order_Item_Meta( $item['item_meta'], $product );

			$item_meta = array();

			$hideprefix = ( isset( $filter['all_item_meta'] ) && $filter['all_item_meta'] === 'true' ) ? null : '_';

			foreach ( $meta->get_formatted( $hideprefix ) as $meta_key => $formatted_meta ) {
				$item_meta[] = array(
					'key' => $meta_key,
					'label' => $formatted_meta['label'],
					'value' => $formatted_meta['value'],
				);
			}

			$order_data['line_items'][] = array(
				'id'           => $item_id,
				'subtotal'     => wc_format_decimal( $order->get_line_subtotal( $item, false, false ), $dp ),
				'subtotal_tax' => wc_format_decimal( $item['line_subtotal_tax'], $dp ),
				'total'        => wc_format_decimal( $order->get_line_total( $item, false, false ), $dp ),
				'total_tax'    => wc_format_decimal( $order->get_line_tax( $item ), 2 ),
				'price'        => wc_format_decimal( $order->get_item_total( $item, false, false ), $dp ),
				'quantity'     => (int) $item['qty'],
				'tax_class'    => ( ! empty( $item['tax_class'] ) ) ? $item['tax_class'] : null,
				'name'         => $item['name'],
				'product_id'   => $product_id,
				'sku'          => $product_sku,
				'meta'         => $item_meta,
			);
		}

		// add shipping
		foreach ( $order->get_shipping_methods() as $shipping_item_id => $shipping_item ) {

			$order_data['shipping_lines'][] = array(
				'id'           => $shipping_item_id,
				'method_id'    => $shipping_item['method_id'],
				'method_title' => $shipping_item['name'],
				'total'        => wc_format_decimal( $shipping_item['cost'], 2 ),
			);
		}

		// add taxes
		foreach ( $order->get_tax_totals() as $tax_code => $tax ) {

			$order_data['tax_lines'][] = array(
				'id'       => $tax->id,
				'rate_id'  => $tax->rate_id,
				'code'     => $tax_code,
				'title'    => $tax->label,
				'total'    => wc_format_decimal( $tax->amount, 2 ),
				'compound' => (bool) $tax->is_compound,
			);
		}

		// add fees
		foreach ( $order->get_fees() as $fee_item_id => $fee_item ) {

			$order_data['fee_lines'][] = array(
				'id'        => $fee_item_id,
				'title'     => $fee_item['name'],
				'tax_class' => ( ! empty( $fee_item['tax_class'] ) ) ? $fee_item['tax_class'] : null,
				'total'     => wc_format_decimal( $order->get_line_total( $fee_item ), 2 ),
				'total_tax' => wc_format_decimal( $order->get_line_tax( $fee_item ), 2 ),
			);
		}

		// add coupons
		foreach ( $order->get_items( 'coupon' ) as $coupon_item_id => $coupon_item ) {

			$order_data['coupon_lines'][] = array(
				'id'     => $coupon_item_id,
				'code'   => $coupon_item['name'],
				'amount' => wc_format_decimal( $coupon_item['discount_amount'], 2 ),
			);
		}

		return array( 'order' => apply_filters( 'woocommerce_api_order_response', $order_data, $order, $fields, $this->server ) );
	}

	/**
	 * Get the total number of orders
	 *
	 * @since 2.1
	 * @param string $status
	 * @param array $filter
	 * @return array
	 */
	public function get_orders_count( $status = null, $filter = array() ) {

		try {
			if ( ! current_user_can( 'read_private_shop_orders' ) ) {
				throw new WC_API_Exception( 'woocommerce_api_user_cannot_read_orders_count', __( 'You do not have permission to read the orders count', 'woocommerce' ), 401 );
			}

			if ( ! empty( $status ) ) {
				$filter['status'] = $status;
			}

			$query = $this->query_orders( $filter );

			return array( 'count' => (int) $query->found_posts );
		} catch ( WC_API_Exception $e ) {
			return new WP_Error( $e->getErrorCode(), $e->getMessage(), array( 'status' => $e->getCode() ) );
		}
	}

	/**
	 * Get a list of valid order statuses
	 *
	 * Note this requires no specific permissions other than being an authenticated
	 * API user. Order statuses (particularly custom statuses) could be considered
	 * private information which is why it's not in the API index.
	 *
	 * @since 2.1
	 * @return array
	 */
	public function get_order_statuses() {

		$order_statuses = array();

		foreach ( wc_get_order_statuses() as $slug => $name ) {
			$order_statuses[ str_replace( 'wc-', '', $slug ) ] = $name;
		}

		return array( 'order_statuses' => apply_filters( 'woocommerce_api_order_statuses_response', $order_statuses, $this ) );
	}

	/**
	 * Create an order
	 *
	 * @since 2.2
	 * @param array $data raw order data
	 * @return array
	 */
	public function create_order( $data ) {

		$data = isset( $data['order'] ) ? $data['order'] : array();

		try {

			// permission check
			if ( ! current_user_can( 'publish_shop_orders' ) ) {
				throw new WC_API_Exception( 'woocommerce_api_user_cannot_create_order', __( 'You do not have permission to create orders', 'woocommerce' ), 401 );
			}

			$data = apply_filters( 'woocommerce_api_create_order_data', $data, $this );

			// default order args, note that status is checked for validity in wc_create_order()
			$default_order_args = array(
				'status'        => isset( $data['status'] ) ? $data['status'] : '',
				'customer_note' => isset( $data['note'] ) ? $data['note'] : null,
			);

			// if creating order for existing customer
			if ( ! empty( $data['customer_id'] ) ) {

				// make sure customer exists
				if ( false === get_user_by( 'id', $data['customer_id'] ) ) {
					throw new WC_API_Exception( 'woocommerce_api_invalid_customer_id', __( 'Customer ID is invalid', 'woocommerce' ), 400 );
				}

				$default_order_args['customer_id'] = $data['customer_id'];
			}

			// create the pending order
			$order = $this->create_base_order( $default_order_args, $data );

			if ( is_wp_error( $order ) ) {
				throw new WC_API_Exception( 'woocommerce_api_cannot_create_order', sprintf( __( 'Cannot create order: %s', 'woocommerce' ), implode( ', ', $order->get_error_messages() ) ), 400 );
			}

			// billing/shipping addresses
			$this->set_order_addresses( $order, $data );

			$lines = array(
				'line_item' => 'line_items',
				'shipping'  => 'shipping_lines',
				'fee'       => 'fee_lines',
				'coupon'    => 'coupon_lines',
			);

			foreach ( $lines as $line_type => $line ) {

				if ( isset( $data[ $line ] ) && is_array( $data[ $line ] ) ) {

					$set_item = "set_{$line_type}";

					foreach ( $data[ $line ] as $item ) {

						$this->$set_item( $order, $item, 'create' );
					}
				}
			}

			// calculate totals and set them
			$order->calculate_totals();

			// payment method (and payment_complete() if `paid` == true)
			if ( isset( $data['payment_details'] ) && is_array( $data['payment_details'] ) ) {

				// method ID & title are required
				if ( empty( $data['payment_details']['method_id'] ) || empty( $data['payment_details']['method_title'] ) ) {
					throw new WC_API_Exception( 'woocommerce_invalid_payment_details', __( 'Payment method ID and title are required', 'woocommerce' ), 400 );
				}

				update_post_meta( $order->id, '_payment_method', $data['payment_details']['method_id'] );
				update_post_meta( $order->id, '_payment_method_title', $data['payment_details']['method_title'] );

				// mark as paid if set
				if ( isset( $data['payment_details']['paid'] ) && true === $data['payment_details']['paid'] ) {
					$order->payment_complete( isset( $data['payment_details']['transaction_id'] ) ? $data['payment_details']['transaction_id'] : '' );
				}
			}

			// set order currency
			if ( isset( $data['currency'] ) ) {

				if ( ! array_key_exists( $data['currency'], get_woocommerce_currencies() ) ) {
					throw new WC_API_Exception( 'woocommerce_invalid_order_currency', __( 'Provided order currency is invalid', 'woocommerce'), 400 );
				}

				update_post_meta( $order->id, '_order_currency', $data['currency'] );
			}

			// set order number
			if ( isset( $data['order_number'] ) ) {

				update_post_meta( $order->id, '_order_number', $data['order_number'] );
			}

			// set order meta
			if ( isset( $data['order_meta'] ) && is_array( $data['order_meta'] ) ) {
				$this->set_order_meta( $order->id, $data['order_meta'] );
			}

			// HTTP 201 Created
			$this->server->send_status( 201 );

			wc_delete_shop_order_transients( $order->id );

			do_action( 'woocommerce_api_create_order', $order->id, $data, $this );

			return $this->get_order( $order->id );

		} catch ( WC_API_Exception $e ) {

			return new WP_Error( $e->getErrorCode(), $e->getMessage(), array( 'status' => $e->getCode() ) );
		}
	}

	/**
	 * Creates new WC_Order.
	 *
	 * Requires a separate function for classes that extend WC_API_Orders.
	 *
	 * @since 2.3
	 * @param $args array
	 * @return WC_Order
	 */
	protected function create_base_order( $args, $data ) {
		return wc_create_order( $args );
	}

	/**
	 * Edit an order
	 *
	 * @since 2.2
	 * @param int $id the order ID
	 * @param array $data
	 * @return array
	 */
	public function edit_order( $id, $data ) {

		$data = isset( $data['order'] ) ? $data['order'] : array();

		try {

			$update_totals = false;

			$id = $this->validate_request( $id, $this->post_type, 'edit' );

			if ( is_wp_error( $id ) ) {
				return $id;
			}

			$data = apply_filters( 'woocommerce_api_edit_order_data', $data, $id, $this );

			$order = wc_get_order( $id );

			$order_args = array( 'order_id' => $order->id );

			// customer note
			if ( isset( $data['note'] ) ) {
				$order_args['customer_note'] = $data['note'];
			}

			// order status
			if ( ! empty( $data['status'] ) ) {

				$order->update_status( $data['status'], isset( $data['status_note'] ) ? $data['status_note'] : '' );
			}

			// customer ID
			if ( isset( $data['customer_id'] ) && $data['customer_id'] != $order->get_user_id() ) {

				// make sure customer exists
				if ( false === get_user_by( 'id', $data['customer_id'] ) ) {
					throw new WC_API_Exception( 'woocommerce_api_invalid_customer_id', __( 'Customer ID is invalid', 'woocommerce' ), 400 );
				}

				update_post_meta( $order->id, '_customer_user', $data['customer_id'] );
			}

			// billing/shipping address
			$this->set_order_addresses( $order, $data );

			$lines = array(
				'line_item' => 'line_items',
				'shipping'  => 'shipping_lines',
				'fee'       => 'fee_lines',
				'coupon'    => 'coupon_lines',
			);

			foreach ( $lines as $line_type => $line ) {

				if ( isset( $data[ $line ] ) && is_array( $data[ $line ] ) ) {

					$update_totals = true;

					foreach ( $data[ $line ] as $item ) {

						// item ID is always required
						if ( ! array_key_exists( 'id', $item ) ) {
							throw new WC_API_Exception( 'woocommerce_invalid_item_id', __( 'Order item ID is required', 'woocommerce' ), 400 );
						}

						// create item
						if ( is_null( $item['id'] ) ) {

							$this->set_item( $order, $line_type, $item, 'create' );

						} elseif ( $this->item_is_null( $item ) ) {

							// delete item
							wc_delete_order_item( $item['id'] );

						} else {

							// update item
							$this->set_item( $order, $line_type, $item, 'update' );
						}
					}
				}
			}

			// payment method (and payment_complete() if `paid` == true and order needs payment)
			if ( isset( $data['payment_details'] ) && is_array( $data['payment_details'] ) ) {

				// method ID
				if ( isset( $data['payment_details']['method_id'] ) ) {
					update_post_meta( $order->id, '_payment_method', $data['payment_details']['method_id'] );
				}

				// method title
				if ( isset( $data['payment_details']['method_title'] ) ) {
					update_post_meta( $order->id, '_payment_method_title', $data['payment_details']['method_title'] );
				}

				// mark as paid if set
				if ( $order->needs_payment() && isset( $data['payment_details']['paid'] ) && true === $data['payment_details']['paid'] ) {
					$order->payment_complete( isset( $data['payment_details']['transaction_id'] ) ? $data['payment_details']['transaction_id'] : '' );
				}
			}

			// set order currency
			if ( isset( $data['currency'] ) ) {

				if ( ! array_key_exists( $data['currency'], get_woocommerce_currencies() ) ) {
					throw new WC_API_Exception( 'woocommerce_invalid_order_currency', __( 'Provided order currency is invalid', 'woocommerce' ), 400 );
				}

				update_post_meta( $order->id, '_order_currency', $data['currency'] );
			}

			// set order number
			if ( isset( $data['order_number'] ) ) {

				update_post_meta( $order->id, '_order_number', $data['order_number'] );
			}

			// if items have changed, recalculate order totals
			if ( $update_totals ) {
				$order->calculate_totals();
			}

			// update order meta
			if ( isset( $data['order_meta'] ) && is_array( $data['order_meta'] ) ) {
				$this->set_order_meta( $order->id, $data['order_meta'] );
			}

			// update the order post to set customer note/modified date
			wc_update_order( $order_args );

			wc_delete_shop_order_transients( $order->id );

			do_action( 'woocommerce_api_edit_order', $order->id, $data, $this );

			return $this->get_order( $id );

		} catch ( WC_API_Exception $e ) {

			return new WP_Error( $e->getErrorCode(), $e->getMessage(), array( 'status' => $e->getCode() ) );
		}
	}

	/**
	 * Delete an order
	 *
	 * @param int $id the order ID
	 * @param bool $force true to permanently delete order, false to move to trash
	 * @return array
	 */
	public function delete_order( $id, $force = false ) {

		$id = $this->validate_request( $id, $this->post_type, 'delete' );

		if ( is_wp_error( $id ) ) {
			return $id;
		}

		wc_delete_shop_order_transients( $id );

		do_action( 'woocommerce_api_delete_order', $id, $this );

		return $this->delete( $id, 'order',  ( 'true' === $force ) );
	}

	/**
	 * Helper method to get order post objects
	 *
	 * @since 2.1
	 * @param array $args request arguments for filtering query
	 * @return WP_Query
	 */
	protected function query_orders( $args ) {

		// set base query arguments
		$query_args = array(
			'fields'      => 'ids',
			'post_type'   => $this->post_type,
			'post_status' => array_keys( wc_get_order_statuses() )
		);

		// add status argument
		if ( ! empty( $args['status'] ) ) {

			$statuses                  = 'wc-' . str_replace( ',', ',wc-', $args['status'] );
			$statuses                  = explode( ',', $statuses );
			$query_args['post_status'] = $statuses;

			unset( $args['status'] );

		}

		$query_args = $this->merge_query_args( $query_args, $args );

		return new WP_Query( $query_args );
	}

	/**
	 * Helper method to set/update the billing & shipping addresses for
	 * an order
	 *
	 * @since 2.1
	 * @param \WC_Order $order
	 * @param array $data
	 */
	protected function set_order_addresses( $order, $data ) {

		$address_fields = array(
			'first_name',
			'last_name',
			'company',
			'email',
			'phone',
			'address_1',
			'address_2',
			'city',
			'state',
			'postcode',
			'country',
		);

		$billing_address = $shipping_address = array();

		// billing address
		if ( isset( $data['billing_address'] ) && is_array( $data['billing_address'] ) ) {

			foreach ( $address_fields as $field ) {

				if ( isset( $data['billing_address'][ $field ] ) ) {
					$billing_address[ $field ] = wc_clean( $data['billing_address'][ $field ] );
				}
			}

			unset( $address_fields['email'] );
			unset( $address_fields['phone'] );
		}

		// shipping address
		if ( isset( $data['shipping_address'] ) && is_array( $data['shipping_address'] ) ) {

			foreach ( $address_fields as $field ) {

				if ( isset( $data['shipping_address'][ $field ] ) ) {
					$shipping_address[ $field ] = wc_clean( $data['shipping_address'][ $field ] );
				}
			}
		}

		$order->set_address( $billing_address, 'billing' );
		$order->set_address( $shipping_address, 'shipping' );

		// update user meta
		if ( $order->get_user_id() ) {
			foreach ( $billing_address as $key => $value ) {
				update_user_meta( $order->get_user_id(), 'billing_' . $key, $value );
			}
			foreach ( $shipping_address as $key => $value ) {
				update_user_meta( $order->get_user_id(), 'shipping_' . $key, $value );
			}
		}
	}

	/**
	 * Helper method to add/update order meta, with two restrictions:
	 *
	 * 1) Only non-protected meta (no leading underscore) can be set
	 * 2) Meta values must be scalar (int, string, bool)
	 *
	 * @since 2.2
	 * @param int $order_id valid order ID
	 * @param array $order_meta order meta in array( 'meta_key' => 'meta_value' ) format
	 */
	protected function set_order_meta( $order_id, $order_meta ) {

		foreach ( $order_meta as $meta_key => $meta_value ) {

			if ( is_string( $meta_key) && ! is_protected_meta( $meta_key ) && is_scalar( $meta_value ) ) {
				update_post_meta( $order_id, $meta_key, $meta_value );
			}
		}
	}

	/**
	 * Helper method to check if the resource ID associated with the provided item is null
	 *
	 * Items can be deleted by setting the resource ID to null
	 *
	 * @since 2.2
	 * @param array $item item provided in the request body
	 * @return bool true if the item resource ID is null, false otherwise
	 */
	protected function item_is_null( $item ) {

		$keys = array( 'product_id', 'method_id', 'title', 'code' );

		foreach ( $keys as $key ) {
			if ( array_key_exists( $key, $item ) && is_null( $item[ $key ] ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Wrapper method to create/update order items
	 *
	 * When updating, the item ID provided is checked to ensure it is associated
	 * with the order.
	 *
	 * @since 2.2
	 * @param \WC_Order $order order
	 * @param string $item_type
	 * @param array $item item provided in the request body
	 * @param string $action either 'create' or 'update'
	 * @throws WC_API_Exception if item ID is not associated with order
	 */
	protected function set_item( $order, $item_type, $item, $action ) {
		global $wpdb;

		$set_method = "set_{$item_type}";

		// verify provided line item ID is associated with order
		if ( 'update' === $action ) {

			$result = $wpdb->get_row(
				$wpdb->prepare( "SELECT * FROM {$wpdb->prefix}woocommerce_order_items WHERE order_item_id = %d AND order_id = %d",
				absint( $item['id'] ),
				absint( $order->id )
			) );

			if ( is_null( $result ) ) {
				throw new WC_API_Exception( 'woocommerce_invalid_item_id', __( 'Order item ID provided is not associated with order', 'woocommerce' ), 400 );
			}
		}

		$this->$set_method( $order, $item, $action );
	}

	/**
	 * Create or update a line item
	 *
	 * @since 2.2
	 * @param \WC_Order $order
	 * @param array $item line item data
	 * @param string $action 'create' to add line item or 'update' to update it
	 * @throws WC_API_Exception invalid data, server error
	 */
	protected function set_line_item( $order, $item, $action ) {

		$creating = ( 'create' === $action );

		// product is always required
		if ( ! isset( $item['product_id'] ) ) {
			throw new WC_API_Exception( 'woocommerce_api_invalid_product_id', __( 'Product ID is required', 'woocommerce' ), 400 );
		}

		// when updating, ensure product ID provided matches
		if ( 'update' === $action ) {

			$item_product_id   = wc_get_order_item_meta( $item['id'], '_product_id' );
			$item_variation_id = wc_get_order_item_meta( $item['id'], '_variation_id' );

			if ( $item['product_id'] != $item_product_id && $item['product_id'] != $item_variation_id ) {
				throw new WC_API_Exception( 'woocommerce_api_invalid_product_id', __( 'Product ID provided does not match this line item', 'woocommerce' ), 400 );
			}
		}

		$product = wc_get_product( $item['product_id'] );

		// must be a valid WC_Product
		if ( ! is_object( $product ) ) {
			throw new WC_API_Exception( 'woocommerce_api_invalid_product', __( 'Product is invalid', 'woocommerce' ), 400 );
		}

		// quantity must be positive float
		if ( isset( $item['quantity'] ) && floatval( $item['quantity'] ) <= 0 ) {
			throw new WC_API_Exception( 'woocommerce_api_invalid_product_quantity', __( 'Product quantity must be a positive float', 'woocommerce' ), 400 );
		}

		// quantity is required when creating
		if ( $creating && ! isset( $item['quantity'] ) ) {
			throw new WC_API_Exception( 'woocommerce_api_invalid_product_quantity', __( 'Product quantity is required', 'woocommerce' ), 400 );
		}

		$item_args = array();

		// quantity
		if ( isset( $item['quantity'] ) ) {
			$item_args['qty'] = $item['quantity'];
		}

		// variations must each have a key & value
		if ( isset( $item['variations'] ) && is_array( $item['variations'] ) ) {
			foreach ( $item['variations'] as $key => $value ) {
				if ( ! $key || ! $value ) {
					throw new WC_API_Exception( 'woocommerce_api_invalid_product_variation', __( 'The product variation is invalid', 'woocommerce' ), 400 );
				}
			}
			$item_args['variation'] = $item['variations'];
		}

		// total
		if ( isset( $item['total'] ) ) {
			$item_args['totals']['total'] = floatval( $item['total'] );
		}

		// total tax
		if ( isset( $item['total_tax'] ) ) {
			$item_args['totals']['tax'] = floatval( $item['total_tax'] );
		}

		// subtotal
		if ( isset( $item['subtotal'] ) ) {
			$item_args['totals']['subtotal'] = floatval( $item['subtotal'] );
		}

		// subtotal tax
		if ( isset( $item['subtotal_tax'] ) ) {
			$item_args['totals']['subtotal_tax'] = floatval( $item['subtotal_tax'] );
		}

		if ( $creating ) {

			$item_id = $order->add_product( $product, $item_args['qty'], $item_args );

			if ( ! $item_id ) {
				throw new WC_API_Exception( 'woocommerce_cannot_create_line_item', __( 'Cannot create line item, try again', 'woocommerce' ), 500 );
			}

		} else {

			$item_id = $order->update_product( $item['id'], $product, $item_args );

			if ( ! $item_id ) {
				throw new WC_API_Exception( 'woocommerce_cannot_update_line_item', __( 'Cannot update line item, try again', 'woocommerce' ), 500 );
			}
		}
	}

	/**
	 * Create or update an order shipping method
	 *
	 * @since 2.2
	 * @param \WC_Order $order
	 * @param array $shipping item data
	 * @param string $action 'create' to add shipping or 'update' to update it
	 * @throws WC_API_Exception invalid data, server error
	 */
	protected function set_shipping( $order, $shipping, $action ) {

		// total must be a positive float
		if ( isset( $shipping['total'] ) && floatval( $shipping['total'] ) < 0 ) {
			throw new WC_API_Exception( 'woocommerce_invalid_shipping_total', __( 'Shipping total must be a positive amount', 'woocommerce' ), 400 );
		}

		if ( 'create' === $action ) {

			// method ID is required
			if ( ! isset( $shipping['method_id'] ) ) {
				throw new WC_API_Exception( 'woocommerce_invalid_shipping_item', __( 'Shipping method ID is required', 'woocommerce' ), 400 );
			}

			$rate = new WC_Shipping_Rate( $shipping['method_id'], isset( $shipping['method_title'] ) ? $shipping['method_title'] : '', isset( $shipping['total'] ) ? floatval( $shipping['total'] ) : 0, array(), $shipping['method_id'] );

			$shipping_id = $order->add_shipping( $rate );

			if ( ! $shipping_id ) {
				throw new WC_API_Exception( 'woocommerce_cannot_create_shipping', __( 'Cannot create shipping method, try again', 'woocommerce' ), 500 );
			}

		} else {

			$shipping_args = array();

			if ( isset( $shipping['method_id'] ) ) {
				$shipping_args['method_id'] = $shipping['method_id'];
			}

			if ( isset( $shipping['method_title'] ) ) {
				$shipping_args['method_title'] = $shipping['method_title'];
			}

			if ( isset( $shipping['total'] ) ) {
				$shipping_args['cost'] = floatval( $shipping['total'] );
			}

			$shipping_id = $order->update_shipping( $shipping['id'], $shipping_args );

			if ( ! $shipping_id ) {
				throw new WC_API_Exception( 'woocommerce_cannot_update_shipping', __( 'Cannot update shipping method, try again', 'woocommerce' ), 500 );
			}
		}
	}

	/**
	 * Create or update an order fee
	 *
	 * @since 2.2
	 * @param \WC_Order $order
	 * @param array $fee item data
	 * @param string $action 'create' to add fee or 'update' to update it
	 * @throws WC_API_Exception invalid data, server error
	 */
	protected function set_fee( $order, $fee, $action ) {

		if ( 'create' === $action ) {

			// fee title is required
			if ( ! isset( $fee['title'] ) ) {
				throw new WC_API_Exception( 'woocommerce_invalid_fee_item', __( 'Fee title is required', 'woocommerce' ), 400 );
			}

			$order_fee         = new stdClass();
			$order_fee->id     = sanitize