<?php

namespace Atak011\VaoCore\Components;

use Illuminate\View\Component;

class Error extends Component
{
    public $message;
    public $message2;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function render()
    {
        return view('vao-core::components.error');
    }
}
