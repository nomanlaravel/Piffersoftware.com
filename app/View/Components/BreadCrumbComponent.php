<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BreadCrumbComponent extends Component
{
    public $modal;
    public $modalId;
    public $modalType;
    public $showClock;

    /**
     * Create a new component instance.
     */
    public function __construct($modal = false, $modalId = '', $modalType = '', $showClock = 'false')
    {
        $this->modal = $modal;
        $this->modalId = $modalId;
        $this->modalType = $modalType;
        $this->showClock = $showClock;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.bread-crumb-component');
    }
}