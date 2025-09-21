<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Cours;

class Home extends Component
{
    public $cours;

    public function mount()
    {
        $this->cours = new Cours();
        $this->cours = $this->cours->getCoursPublie();
    }
    
    public function render()
    {
        return view('livewire.home');
    }
}
