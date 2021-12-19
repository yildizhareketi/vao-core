<?php

namespace Atak011\VaoCore\Components\Toast;

use Illuminate\View\Component;

class ToastNotification extends Component
{
    public $type;
    public $text;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text,$type = 'success')
    {

        $this->type = $type;
        $this->text = $text;
    }

    public function render()
    {
        return view('vao-core::components.toast-notification');
    }
}
