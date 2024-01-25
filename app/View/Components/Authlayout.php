<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;

class Authlayout extends Abstractlayout
{

    /**
     * Get the view / contents that represent the component.
     */

     public function __construct(public string $title = '', public string $action = '', public string $submitMessage = 'Soumettre')
    {
        parent::__construct($title);
    }

    public function render(): View|Closure|string
    {
        return view('layouts.auth');
    }
}
