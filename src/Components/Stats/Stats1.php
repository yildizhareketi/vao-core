<?php

namespace Atak011\VaoCore\Components\Stats;

use Illuminate\View\Component;

class Stats1 extends Component
{
    public $title;
    public $amount;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($amount,$title)
    {
        $this->amount = $amount;
        $this->title = $title;
    }

    public function render()
    {
        return view('vao-core::components.stats-1');
    }
}
