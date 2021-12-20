<?php

namespace Atak011\VaoCore\Components\Table;

use Illuminate\View\Component;

class DatatableTable extends Component
{
    public $modelName;
    public $newButton;
    public $modelSlug;
    public $columns;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($modelName,$modelSlug,$columns,$newButton = false)
    {

        $this->modelName = $modelName;
        $this->newButton = $modelName;
        $this->modelSlug = $modelSlug;
        $this->columns   = $columns;
    }

    public function render()
    {
        return view('vao-core::components.datatable-table');
    }
}
