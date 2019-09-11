<?php
namespace App\Controllers\Elementor\Widgets;

use \Elementor\Controls_Manager;
use Elementor\Utils;
use \Elementor\Widget_Base;
use Timber\Timber;

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
    
    private function render_image_controls(): void
    {
        $this->start_controls_section(
            'section_image',
            [
                'label'     => 'Image',
                'tab'       => Controls_Manager::TAB_CONTENT
            ]
        );
    
        $this->add_control(
            'image',
            [
                'label'     => __('Choose Image'),
                'type'      => Controls_Manager::MEDIA,
                'default'   => [
                    'url' => Utils::get_placeholder_image_src(),
                ]
            ]
        );
    
        $this->end_controls_section();
    }
    
    private function render_text_controls(): void
    {
        $this->start_controls_section(
            'section_text',
            [
                'label'     => 'Text',
                'tab'       => Controls_Manager::TAB_CONTENT
            ]
        );
        
        $this->add_control(
            'content',
            [
                'label' => __('Insert text'),
                'type'  => Controls_Manager::TEXTAREA
            ]
        );
        
        $this->end_controls_section();
    }
    
    private function render_link_controls(): void
    {
        $this->start_controls_section(
            'section_link',
            [
                'label' => 'Link',
                'tab'   => Controls_Manager::TAB_CONTENT
            ]
        );
        
        $this->add_control(
            'link',
            [
                'label' => __('Link'),
                'type'  => Controls_Manager::URL,
                'show_external' => true
            ]
        );
        
        $this->end_controls_section();
    }
    
    protected function _register_controls(): void
    {
        $this->render_image_controls();
        $this->render_text_controls();
        $this->render_link_controls();
    }
    
    protected function render(): void
    {
        $settings = $this->get_settings();
        $context = Timber::get_context();
        $context['image'] = $settings['image']['url'];
        $context['title'] = $settings['content'];
        $context['link'] = $settings['link'];
        
        Timber::render('partials/blocks/CTABanner.twig', $context);
    }
}
