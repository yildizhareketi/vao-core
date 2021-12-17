<?php

namespace Atak011\VaoCore\Components\Toast;

use Illuminate\View\Component;

class ToastInformation extends Component
{
    public $type;
    public $text;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'success',$text)
    {

        $this->type = $type;
        $this->text = $text;
    }

    public function render()
    {
        return view('vao-core::components.toast-notification');
    }
}
