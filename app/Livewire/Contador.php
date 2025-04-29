<?php

namespace App\Livewire;

use Livewire\Component;

class Contador extends Component
{
    public $contador=100;
    public function render()
    {
        return view('livewire.pruebas');
    }
    public function incrementar()
    {
        $this->contador++;
    }
    public function decrementar()
    {
        $this->contador--;
    }
}
