<?php

namespace App\Controllers\Meta;

use Carbon_Fields\Container;
use Carbon_Fields\Field as Meta;

class ProductMeta extends Field
{
    public function register() : void
    {
        Container::make('post_meta', __('Settings'))
            ->where('post_type', '=', 'product')
            ->add_fields(
                [
                    Meta::make('image', 'header_image', __('Header Image')),
                    
                    Meta::make('image', 'hover_image', __('Hover Image')),
                    
                    Meta::make('complex', 'faq', __('FAQ'))
                        ->add_fields([
                            Meta::make('text', 'question', __('Question')),
                            Meta::make('text', 'answer', __('Answer')),
                        ])
                ]
            );
    }
}
