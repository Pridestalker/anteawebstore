<?php
namespace App\Controllers\Customizer\Store;

use App\Controllers\Customizer\General\Customizer;
use App\Providers\KirkiServiceProvider;

class ArchiveCustomizerController extends Customizer
{
    protected $section = [
        'title'         => 'Store archive settings',
        'description'   => 'These setting control the product archive/store'
    ];
    
    protected $section_name = 'store_archive';
    
    protected $panel = [
        'title'         => 'Store',
        'description'   => 'Store settings'
    ];
    
    protected $panel_name = 'store_settings';
    
    protected $fields = [
        [
            'type'      => 'text',
            'id'        => KirkiServiceProvider::ID,
            'settings'  => 'store_archive_filter_shortcode',
            'section'   => 'store_archive',
            'label'     => 'Shortcode archive filter',
        ]
    ];
}
