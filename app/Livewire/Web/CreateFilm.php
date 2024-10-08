<?php

namespace App\Livewire\Web;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Film;

class CreateFilm extends Component
{
    use WithFileUploads;

    public $title;
    public $director;
    public $summary;
    public $cover;

    protected $rules = [
        'title' => 'required|string|max:255',
        'summary' => 'required|string',
        'director' => 'required!string',
        'cover' => 'required|image|max:1024'
    ];

    public function submit()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'summary' => 'required|string',
            'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $coverPath = $this->cover->store('covers', 'public');

        $film = Film::create([
            'title' => $this->title,
            'director' => $this->director,
            'summary' => $this->summary,
            'cover' => $coverPath
        ]);

        return redirect()->route('film.show', ['id' => $film->id]);
    }

    public function render()
    {
        return view('livewire.web.create-film');
    }
}