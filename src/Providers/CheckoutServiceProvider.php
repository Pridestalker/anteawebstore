<?php
namespace App\Providers;

use WC_Checkout;
use WC_Order;

class CheckoutServiceProvider
{
    public function __construct()
    {
        add_filter('woocommerce_checkout_fields', [ $this, 'custom_checkout_fields_order' ]);
        add_filter('woocommerce_default_address_fields', [ $this, 'custom_billing_fields' ]);
        add_action('woocommerce_after_checkout_billing_form', [ $this, 'custom_checkout_fields' ]);
        add_action('woocommerce_checkout_update_order_meta', [ $this, 'update_checkout_fields' ]);
        add_action('woocommerce_checkout_process', [ $this, 'check_fields_values' ]);
        add_action('woocommerce_review_order_before_submit', [ $this, 'add_checkbox_to_checkout' ]);
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
        
        if (!empty($_POST['gdpr'])) {
            update_post_meta(
                $order_id,
                'gdpr_accepted',
                time()
            );
        }
    }
    
    public function check_fields_values() //phpcs:ignore
    {
        if (empty($_POST['gdpr'])) {
            wc_add_notice(__('Je moet akkoord gaan met de algemene voorwaarden', 'agws'), 'error');
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
        <p><strong>Algemene voorwaarden geaccepteerd op:</strong> <?= date('m/d/Y', (int) $order->get_meta('gdpr')) ?></p>
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
        return $checkout_fields;
    }
    
    /**
     * @param array $address_fields
     *
     * @return array
     */
    public function custom_billing_fields($address_fields) // phpcs:ignore
    {
        $address_fields['address_1']['placeholder'] = '';
        return $address_fields;
    }
    
    /**
     * @return void
     */
    public function add_checkbox_to_checkout() // phpcs:ignore
    {
        woocommerce_form_field(
                'gdpr',
            [
                'type'          => 'checkbox',
                'class'         => ['form-row privacy', 'checkout-form--privacy'],
                'required'      => true,
                'label'         => sprintf(__('Ik ga akkoord met de <a href="%s">algemene voorwaarden</a>'), 'https://www.anteagroup.nl/sites/default/files/files/Algemene-voorwaarden_Antea-Group-2018.pdf')
            ]
        );
    }
}
