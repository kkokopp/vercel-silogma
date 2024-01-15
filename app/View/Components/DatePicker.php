<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DatePicker extends Component
{
    public $value;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $value = null,
    )
    {
        //
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.datepicker');
    }
}
