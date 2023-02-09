<?php

namespace App\View\Components;

use App\Models\Feedback;
use Illuminate\View\Component;

class Review extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Feedback $feedback)
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
        return view('components.review');
    }
}
