<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ChooseUs extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $header, public string $icon = 'fa-home')
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.choose-us');
    }
}
