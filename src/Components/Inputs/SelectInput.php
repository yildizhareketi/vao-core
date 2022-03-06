<?php

namespace Atak011\VaoCore\Components\Inputs;

use Illuminate\View\Component;

class SelectInput extends Component
{

    public $label;
    public $name;
    public $dataset;
    public $placeholder;
    public $multiple;
    public $id;
    public $hidden;
    public $dataKeyValue;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = null, $name, $id = null, $dataset = null, $placeholder = null, $multiple = false, $hidden = false,$dataKeyValue = false)
    {
        $this->label = $label;
        $this->name = $name;
        $this->dataset = $dataset;
        $this->placeholder = $placeholder;
        $this->multiple = $multiple;
        $this->id = $id;
        $this->hidden = $hidden;
        $this->dataKeyValue = $dataKeyValue;
    }

    public function render()
    {
        return view('vao-core::components.select-input');
    }
}
