<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CustomButtonComponent extends Component
{
    public $isLink;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($isLink)
    {
        $this->isLink = $isLink;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.custom-button-component');
    }
}
