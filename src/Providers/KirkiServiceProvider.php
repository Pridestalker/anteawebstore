<?php
namespace App\Providers;

class KirkiServiceProvider {
	const ID = 'anws';
	
	public function __construct() {
		\Kirki::add_config(
			self::ID,
			[
				'capability'    => 'edit_theme_options',
				'option_type'   => 'theme_mod'
			]
		);
		
		$this->boot();
	}
	
	public function boot(): void {
		$fields = include get_stylesheet_directory() . '/src/config/kirki.php';
		
		foreach ($fields as $field) {
			new $field();
		}
	}
}
