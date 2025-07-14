<?php

namespace App\View\Components\layout;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Aside extends Component
{
    /**
     * Create a new component instance.
     */
    public $routes;
    public function __construct()
    {
        $this->routes=[
            [
            "label"=>"Dashboard",
            "icon"=>"fas fa-desktop",
            "route_name"=> "dashboard",
            "route_active"=>"dashboard",
            "is_dropdown"=> false
            ],
            [
            "label"=>"Master Data",
            "icon" =>"fas fa-database",
            "route_active"=>"master-data.*",
            "is_dropdown"=> true,
            "dropdown"=> [[
                "label"=>"Kategori",
                "route_active"=> "master-data.kategori.*",
                "route_name"=>"master-data.kategori.index"
            ]]
            ]
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.aside');
    }
}
