<?php

namespace Atak011\VaoCore\Components\Forms;

use Illuminate\View\Component;

class UpsertForm extends Component
{
    public $title;
    public $buttonText;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title ,$buttonText)
    {
        $this->title = $title;
        $this->buttonText = $buttonText;
    }

    public function render()
    {
        return view('vao-core::components.upsert-form');
    }
}
