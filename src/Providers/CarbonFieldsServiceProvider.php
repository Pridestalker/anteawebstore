<?php
namespace App\Providers;

class CarbonFieldsServiceProvider {
	public function __construct() {
		add_action('after_setup_theme', static function () {
			\Carbon_Fields\Carbon_Fields::boot();
		});
		
		$this->register();
	}
	
	/**
	 * Register the custom meta fields
	 *
	 * @return void
	 */
	public function register(): void {
		$fields = include get_stylesheet_directory() . '/src/config/meta.php';

		foreach ($fields as $field) {
			add_action('carbon_fields_register_fields', [new $field(), 'register']);
		}
	}
}
