<?php

namespace Atak011\VaoCore\Components\Forms;

use Illuminate\View\Component;

class Form extends Component
{
    public $title;
    public $buttonText;
    public $method;
    public $uri;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $buttonText,$uri,$method=null,$title = null)
    {
        $this->title = $title;
        $this->buttonText = $buttonText;
        $this->uri = $uri;
        $this->method = $method;
    }

    public function render()
    {
        return view('vao-core::components.form');
    }
}
