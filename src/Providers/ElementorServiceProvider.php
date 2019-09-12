<?php
namespace App\Providers;


class ElementorServiceProvider
{
    protected $widgets;
    public function __construct()
    {
        $providers     = include get_stylesheet_directory() . '/src/config/elementor.php';
        $this->widgets = $providers['widgets'];
        $this->boot();
    }
    
    public function boot(): void
    {
        foreach ($this->widgets as $widget) {
            add_action('elementor/widgets/widgets_registered', static function () use ($widget) {
                \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new $widget());
            });
        }
    }
}
