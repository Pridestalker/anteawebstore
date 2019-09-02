<?php
namespace App\Controllers\Customizer\Footer;

use App\Controllers\Customizer\General\Customizer;
use App\Enums\FontAwesome;
use App\Providers\KirkiServiceProvider;

/**
 * Class TopBarController
 * @package App\Controllers\Customizer\Footer
 */
class TopBarController extends Customizer
{
	use FontAwesome;
	
	protected $section = [
		'title'         => 'Footer Top Bar Settings',
		'description'   => 'These settings control the upper row in the footer.'
	];
	
	protected $section_name = 'footer_top';
	
	protected $panel = [
		'title'         => 'Footer',
		'description'   => 'Footer settings',
	];
	
	protected $panel_name = 'footer_settings';
	
	public function register_custom_controls() : void {
		\Kirki::add_field(
			KirkiServiceProvider::ID,
			[
				'type'      => 'repeater',
				'settings'  => 'footer_top_bar_content',
				'label'     => 'Invulling',
				'section'   => 'footer_top',
				'fields'    => [
					'icon'      => [
						'type'          => 'select',
						'label'         => 'Icon',
						'description'   => 'Icoontje voor bij de regel tekst',
						'choices'       => $this->getIconsForSelect(),
					],
					'text'      => [
						'type'          => 'text',
						'label'         => 'Text',
						'description'   => 'Een regel tekst',
					]
				]
			]
		);
	}
}
