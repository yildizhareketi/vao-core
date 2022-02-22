<?php

namespace Atak011\VaoCore\Components\Forms;

use Illuminate\View\Component;

class UpsertForm extends Component
{
    public $title;
    public $buttonText;
    public $method;
    public $modelSlug;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title ,$buttonText,$modelSlug,$method=null)
    {
        $this->title = $title;
        $this->buttonText = $buttonText;
        $this->modelSlug = $modelSlug;
        $this->method = $method;
    }

    public function render()
    {
        return view('vao-core::components.upsert-form');
    }
}
