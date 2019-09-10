<?php
namespace App\Controllers\Elementor\Widgets;

use \Elementor\Widget_Base;

class BannerWidget extends Widget_Base
{
    public function get_name(): string
    {
        return 'banner';
    }
    
    public function get_title()
    {
        return __('Banner');
    }
    
    public function get_categories(): array
    {
        return ['basic', 'general'];
    }
    
    public function get_icon(): string
    {
        return 'eicon-image-bold';
    }
}
