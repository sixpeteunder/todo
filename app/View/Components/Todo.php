<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Todo extends Component
{
    public $todo;

    /**
     * Create a new component instance.
     *
     * @param \App\Todo $todo
     */
    public function __construct(\App\Todo $todo)
    {
        $this->todo = $todo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.todo');
    }
}
