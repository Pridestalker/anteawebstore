<?php
namespace App\Providers;

use WC_Checkout;
use WC_Order;

class CheckoutServiceProvider
{
    public function __construct()
    {
        add_filter('woocommerce_checkout_fields', [ $this, 'custom_checkout_fields_order' ]);
        add_action('woocommerce_after_checkout_billing_form', [ $this, 'custom_checkout_fields' ]);
        add_action('woocommerce_checkout_update_order_meta', [ $this, 'update_checkout_fields' ]);
        add_action('woocommerce_admin_order_data_after_billing_address', [$this, 'show_checkout_fields_order']);
    }
    
    /**
     * Adds custom fields to the checkout form.
     *
     * @param WC_Checkout $checkout
     *
     * @return void
     */
    public function custom_checkout_fields( $checkout ): void { // phpcs:ignore
        woocommerce_form_field(
            'kostenplaats',
            [
                'label'    => __('Kostenplaats', 'agws'),
                'required' => false,
                'placeholder'   => 'Invullen indien van toepassing',
                'class'    => [ 'form-row-wide', 'checkout-form--kostenplaats' ],
                'clear'    => true,
            ],
            $checkout->get_value('kostenplaats')
        );
        
        woocommerce_form_field(
            'oprachtnr',
            [
                'label'    => __('Opdrachtnummer', 'agws'),
                'required' => false,
                'placeholder'   => 'Invullen indien van toepassing',
                'class'    => [ 'form-row-wide', 'checkout-form--opdrachtnr' ],
                'clear'    => true,
            ],
            $checkout->get_value('opdrachtnr')
        );
        
        woocommerce_form_field(
            'opmerkingen',
            [
                'label'    => __('Vragen en/of opmerkingen', 'agws'),
                'type'     => 'textarea',
                'required' => false,
                'clear'    => true,
                'class'    => [ 'form-row-wide', 'checkout-form--opmerkingen', 'checkout-form--textarea' ]
            ],
            $checkout->get_Value('opmerkingen')
        );
    }
    
    /**
     * @param int $order_id
     *
     * @return void
     */
    public function update_checkout_fields($order_id): void // phpcs:ignore
    {
        if (!empty($_POST['kostenplaats'])) {
            update_post_meta(
                $order_id,
                'kostenplaats',
                sanitize_text_field($_POST['kostenplaats'])
            );
        }
        
        if (!empty($_POST['opdrachtnr'])) {
            update_post_meta(
                $order_id,
                'opdrachtnr',
                sanitize_text_field($_POST['opdrachtnr'])
            );
        }
        
        if (!empty($_POST['opmerkingen'])) {
            update_post_meta(
                $order_id,
                'opmerkingen',
                sanitize_textarea_field($_POST['opmerkingen'])
            );
        }
    }
    
    /**
     * @param WC_Order $order
     *
     * @return void
     */
    public function show_checkout_fields_order($order): void // phpcs:ignore
    {
        ?>
        <p><strong>Kostenplaats:</strong> <?= $order->get_meta('kostenplaats') ?></p>
        <p><strong>Opdrachtnummer:</strong> <?= $order->get_meta('opdrachtnr') ?></p>
        <p><strong>Vragen en/of opmerkingen:</strong>
        <p><?= $order->get_meta('opmerkingen') ?></p>
        <?php
    }
    
    /**
     * @param array $checkout_fields
     *
     * @return array
     */
    public function custom_checkout_fields_order($checkout_fields) // phpcs:ignore
    {
        $checkout_fields['billing']['billing_email']['priority'] = 20;
        $checkout_fields['billing']['billing_address_1']['placeholder'] = null;
        return $checkout_fields;
    }
}
