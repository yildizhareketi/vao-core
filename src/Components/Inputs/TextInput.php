<?php

namespace Atak011\VaoCore\Components;

use Illuminate\View\Component;

class TextInput extends Component
{
    public $message;
    public $message2;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
        $this->message2 = $message;
    }

    public function render()
    {
        return view('vao-core::components.alert');
    }
}
