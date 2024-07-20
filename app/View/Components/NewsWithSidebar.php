<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NewsWithSidebar extends Component
{
    
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = '',
        public bool $sidebarRight = false
        
        
    )
    {
        //
    }
    public function paginate($item = null)
    {   
        if($item){
            return $item;
        }
        return false;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.news-with-sidebar');
    }
}
