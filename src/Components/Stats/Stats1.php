<?php

namespace Atak011\VaoCore\Components\Stats;

use Illuminate\View\Component;

class Stats1 extends Component
{
    public $title;
    public $amount;
    public $color;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($amount,$title,$color = null)
    {
        $this->amount = $amount;
        $this->title = $title;
        $this->color = $color ?? 'success';
    }

    public function render()
    {
        return view('vao-core::components.stats-1');
    }
}
