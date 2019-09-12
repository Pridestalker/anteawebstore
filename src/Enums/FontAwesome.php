<?php
namespace App\Enums;

trait FontAwesome
{
    public $icons = [
        'phone'     => [
            'title' => 'Phone',
            'icon'  => 'fas fa-phone'
        ],
        'user'      => [
            'title' => 'User',
            'icon'  => 'fas fa-user'
        ],
        'shopping-cart' => [
            'title' => 'Shopping Cart',
            'icon'  => 'fas fa-shopping-cart'
        ],
        'smile'     => [
            'title' => 'Smile',
            'icon'  => 'fas fa-smile'
        ],
        'check'     => [
            'title' => 'Checkmark',
            'icon'  => 'fas fa-check'
        ],
        'file'      => [
            'title' => 'File',
            'icon'  => 'fas fa-file'
        ]
    ];
    
    /**
     * Get an icon from the base array
     *
     * @param string $key the key to search for
     * @param null   $type the type to get (title or icon)
     *
     * @return string|array
     * @throws \Exception
     */
    public function getIcon(string $key, $type = null)
    {
        if (!array_key_exists($key, $this->icons)) {
            throw new \Exception('Key does not exist');
        }
        
        if ($type) {
            return $this->icons[$key][$type];
        }
        return $this->icons[$key];
    }
    
    /**
     * Get the icons as array ready for select options.
     *
     * @return array the icons in icon -> title format
     */
    public function getIconsForSelect(): array
    {
        $data = [];
        foreach ($this->icons as $icon) {
            $data[str_replace(' ', '_', $icon['icon'])] = $icon['title'];
        }
        
        return $data;
    }
    
    public function pushIcon($params): void
    {
        if (is_array($params)) {
            if (!array_key_exists('title', $params)) {
                throw new \Exception('Title not passed');
            }
            if (!array_key_exists('id', $params)) {
                throw new \Exception('Identifier not passed');
            }
            if (!array_key_exists('icon', $params)) {
                throw new \Exception('Icon not passed');
            }
            
            $this->icons [$params['id']] = [
                'title' => $params['title'],
                'icon' => $params['icon']
            ];
        }
    }
}
