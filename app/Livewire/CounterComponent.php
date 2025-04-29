<?php

namespace App\Livewire;

use Livewire\Component;

class CounterComponent extends Component
{
    public $counter = 0;
    public function render()
    {
        return view('livewire.counter-component');
    }
    public function increment()
    {
        $this->counter++;
    }
    public function decrement()
    {
        $this->counter--;
    }
}
