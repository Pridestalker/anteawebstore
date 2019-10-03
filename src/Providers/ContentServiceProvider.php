<?php


namespace App\Providers;


class ContentServiceProvider
{
    /**
     * ContentServiceProvider constructor.
     */
    public function __construct()
    {
        $this->boot();
        $this->registered();
    }
    
    /**
     * Adds functionality to the theme.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->addToTwigContext();
    }
    
    /**
     * Adds functionality to the theme after the boot function.
     *
     * @return void
     */
    public function registered(): void
    {
    }
    
    
    private function addToTwigContext() {
        add_filter(
            'timber/context',
            static function ($context) {
                if (function_exists('wc') &&
                    !is_admin() &&
                    wc()->cart) {
                    $context['wc_cart_count'] = wc()->cart->get_cart_contents_count();
                }
                
                return $context;
            }
        );
    }
}
