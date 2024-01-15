<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UploadImage extends Component
{
    public $image;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $image = null,
    )
    {
        //
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.upload-image');
    }
}
