<?php
namespace App\Controllers\Meta;


use App\Enums\FontAwesome;
use Carbon_Fields\Container;
use Carbon_Fields\Field as Meta;

class MenuMeta extends Field {
	use FontAwesome;
	
	public function register() : void {
		Container::make('nav_menu_item', __('Menu Settings'))
			->add_fields(
				[
					Meta::make('select', 'crb_menu_icon', __('Choose menu icon'))
						->set_options($this->getIconsForSelect())
				]
			);
	}
}
