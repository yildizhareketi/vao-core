<?php

namespace Atak011\VaoCore\Components\Table;

use Illuminate\View\Component;

class DatatableTable extends Component
{
    public $modelName;
    public $newButton;
    public $modelSlug;
    public $columns;
    public $extraAttributes;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($modelName,$modelSlug,$columns,$newButton = false,$extraAttributes = null)
    {

        $this->modelName = $modelName;
        $this->newButton = $newButton;
        $this->modelSlug = $modelSlug;
        $this->columns   = $columns;
        $this->extraAttributes   = $extraAttributes;
    }

    public function render()
    {
        return view('vao-core::components.datatable-table');
    }
}
