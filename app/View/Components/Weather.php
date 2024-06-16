<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Weather extends Component
{
    /**
     * Create a new component instance.
     * On injecte notre weather
     */
    public function __construct(private \App\Weather $weather)
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     * Dans la vue nous pourrons ensuite lui renvoyer le contenu auquel on souhaite accéder
     */
    public function render(): View|Closure|string
    {
        return view('components.weather', [
            'sunny' => $this->weather->isSunnyTommorow()
        ]);
    }
}
