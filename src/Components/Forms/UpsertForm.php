<?php

namespace Atak011\VaoCore\Components\Forms;

use Illuminate\View\Component;

class UpsertForm extends Component
{
    public $title;
    public $buttonText;
    public $method;
    public $modelSlug;
    public $modelId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title ,$buttonText,$modelSlug,$method=null,$modelId=null)
    {
        $this->title = $title;
        $this->buttonText = $buttonText;
        $this->modelSlug = $modelSlug;
        $this->method = $method;
        $this->modelId = $modelId;
    }

    public function render()
    {
        return view('vao-core::components.upsert-form');
    }
}
