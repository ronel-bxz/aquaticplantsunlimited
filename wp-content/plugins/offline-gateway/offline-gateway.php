<?php
/*
 * Plugin Name: WooCommerce Offline Payment Gateway
 * Plugin URI: https://rudrastyh.com/woocommerce/payment-gateway-plugin.html
 * Description: Take credit card payments on your store.
 * Author: Misha Rudastyh
 * Author URI: http://rudrastyh.com
 * Version: 1.0.1
 *
 /*
 * This action hook registers our PHP class as a WooCommerce payment gateway
 */
/**
 * Offline Payment Gateway
 *
 * Provides an Offline Payment Gateway; mainly for testing purposes.
 * We load it later to ensure WC is loaded first since we're extending it.
 *
 * @class       WC_Gateway_Offline
 * @extends     WC_Payment_Gateway
 * @version     1.0.0
 * @package     WooCommerce/Classes/Payment
 * @author      SkyVerge
 */
add_action( 'plugins_loaded', 'wc_offline_gateway_init', 11 );

function wc_offline_gateway_init() {

    class WC_Gateway_Offline extends WC_Payment_Gateway {

    public function __construct(){

    	$this->id;
    	$this->icon;
    	$this->has_fields;
    	$this->method_title;
    	$this->method_description;

    }
    	/**
		 * Initialize Gateway Settings Form Fields
		 */
		public function init_form_fields() {
			$this->init_form_fields();
		    $this->init_settings();
		    $this->form_fields = apply_filters( 'wc_offline_form_fields', array(
		          
		        'enabled' => array(
		            'title'   => __( 'Enable/Disable', 'wc-gateway-offline' ),
		            'type'    => 'checkbox',
		            'label'   => __( 'Enable Offline Payment', 'wc-gateway-offline' ),
		            'default' => 'yes'
		        ),

		        'title' => array(
		            'title'       => __( 'Title', 'wc-gateway-offline' ),
		            'type'        => 'text',
		            'description' => __( 'This controls the title for the payment method the customer sees during checkout.', 'wc-gateway-offline' ),
		            'default'     => __( 'Offline Payment', 'wc-gateway-offline' ),
		            'desc_tip'    => true,
		        ),

		        'description' => array(
		            'title'       => __( 'Description', 'wc-gateway-offline' ),
		            'type'        => 'textarea',
		            'description' => __( 'Payment method description that the customer will see on your checkout.', 'wc-gateway-offline' ),
		            'default'     => __( 'Please remit payment to Store Name upon pickup or delivery.', 'wc-gateway-offline' ),
		            'desc_tip'    => true,
		        ),

		        'instructions' => array(
		            'title'       => __( 'Instructions', 'wc-gateway-offline' ),
		            'type'        => 'textarea',
		            'description' => __( 'Instructions that will be added to the thank you page and emails.', 'wc-gateway-offline' ),
		            'default'     => '',
		            'desc_tip'    => true,
		        ),
		    ) );
		}
		public function process_payment( $order_id ) {
    
		    $order = wc_get_order( $order_id );
		            
		    // Mark as on-hold (we're awaiting the payment)
		    $order->update_status( 'on-hold', __( 'Awaiting offline payment', 'wc-gateway-offline' ) );
		            
		    // Reduce stock levels
		    $order->reduce_order_stock();
		            
		    // Remove cart
		    WC()->cart->empty_cart();
		            
		    // Return thankyou redirect
		    return array(
		        'result'    => 'success',
		        'redirect'  => $this->get_return_url( $order )
		    );
		}
		/**
			 * Output for the order received page.
			 */
			public function thankyou_page() {
			    if ( $this->instructions ) {
			        echo wpautop( wptexturize( $this->instructions ) );
			    }
			}
			    
			    
			/**
			 * Add content to the WC emails.
			 *
			 * @access public
			 * @param WC_Order $order
			 * @param bool $sent_to_admin
			 * @param bool $plain_text
			 */
			public function email_instructions( $order, $sent_to_admin, $plain_text = false ) {
			        
			    if ( $this->instructions && ! $sent_to_admin && 'offline' === $order->payment_method && $order->has_status( 'on-hold' ) ) {
			        echo wpautop( wptexturize( $this->instructions ) ) . PHP_EOL;
			    }
			}

    } // end \WC_Gateway_Offline class

    		function wc_offline_add_to_gateways( $gateways ) {
			    $gateways[] = 'WC_Gateway_Offline';
			    return $gateways;
			}
			add_filter( 'woocommerce_payment_gateways', 'wc_offline_add_to_gateways' );
}