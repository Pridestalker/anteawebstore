<?php
namespace App\Controllers\Elementor\Widgets;

use DusanKasan\Knapsack\Collection;
use DusanKasan\Knapsack\Exceptions\InvalidArgument;
use ElementorPro\Modules\QueryControl\Controls\Group_Control_Query;
use ElementorPro\Modules\Woocommerce\Classes\Products_Renderer;
use Timber\Timber;

class SingleProductWidget extends \Elementor\Widget_Base {
	 public function get_name(): string {
	 	return 'single-product';
	 }
	 
	 public function get_title() {
	 	return __('Single product card');
	 }
	 
	 public function get_icon(): string {
	 	return 'fa fa-code';
	 }
	 
	 public function get_categories(): array {
	 	return ['general', 'woocommerce-elements'];
	 }
	 
	 protected function _register_controls(): void
	 {
         $this->render_query_controls();
	 }
	 
	 private function render_query_controls(): void
     {
	     $this->start_controls_section(
		     'section_query',
		     [
			     'label' => 'Query',
			     'tab'   => \Elementor\Controls_Manager::TAB_CONTENT
		     ]
	     );
	
	     $this->add_group_control(
		     Group_Control_Query::get_type(),
		     [
			     'name' => Products_Renderer::QUERY_CONTROL_NAME,
			     'post_type' => 'product',
			     'presets' => [ 'full' ],
			     'fields_options' => [
				     'post_type' => [
					     'default' => 'by_id',
					     'options' => [
						     'by_id' => _x( 'Manual Selection', 'Posts Query Control', 'elementor-pro' ),
					     ],
				     ],
			     ],
			     'exclude' => [
				     'posts_per_page',
				     'exclude_authors',
				     'authors',
				     'offset',
				     'related_fallback',
				     'related_ids',
				     'query_id',
				     'avoid_duplicates',
				     'ignore_sticky_posts',
				     'orderby',
				     'order'
			     ],
		     ]
	     );
	
	     $this->end_controls_section();
     }
     
     protected function render(): void
     {
	     $settings = $this->get_settings();
	     
	     try {
		     $post_ids = new Collection($settings[ 'query_posts_ids' ]);
	     } catch (InvalidArgument $exception) {
	         // Do Nothing no product supplied
             return;
         }
	     $context = Timber::get_context();

	     $products = Timber::get_posts($post_ids->flatten()->toArray());
	     
	     foreach ($products as $product) {
	        $context['product'] = $product;
	        Timber::render('partials/tease/product-vertical.html.twig', $context);
	     }
     }
}
