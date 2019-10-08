<?php
namespace App\Controllers\Elementor\Widgets;

use \Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;
use \Elementor\Widget_Base;
use Timber\Image;
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
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
    
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'      => 'image',
                'default'   => 'large',
                'separator' => 'none'
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
        $image = new Image($this->get_image($settings));
        
        $context['image'] = $image->src($settings['image_size'] ?? 'full');
        $context['title'] = $settings['content'];
        $context['link'] = $this->get_link($settings);
        
        Timber::render('partials/blocks/CTABanner.twig', $context);
    }
    
    /**
     * @param array $settings
     *
     * @return int|string
     */
    private function get_image($settings)
    {
        return $settings['image']['id'] !== '' ? $settings['image']['id'] : $settings['image']['url'];
    }
    
    /**
     * @param array $settings
     *
     * @return bool|array
     */
    private function get_link($settings)
    {
        if ($settings['link']['url'] !== '') {
            return $settings['link'];
        }
        
        return false;
    }
}
