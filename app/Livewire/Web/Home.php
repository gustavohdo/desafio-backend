<?php

namespace App\Livewire\Web;

use App\Models\Film;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {

        $films = Film::all();
        return view('livewire.web.home', compact('films'));
    }
}
