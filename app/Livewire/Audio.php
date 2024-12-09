<?php

namespace App\Livewire;

use App\AI\Assistant;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Audio extends Component
{
    #[Validate('required|string|max:1000')]
    public string $prompt= '';

    public string $file ='';

    public function mount()
    {
        $this->generate();
    }

    public function generate()
    {
        $this->validate();

        $mp3 = Assistant::speech($this->prompt);

        $fileName = md5($mp3) . ".mp3";

        file_put_contents(public_path("files/" . $fileName), $mp3);

        $this->file = asset("files/" . $fileName);

        $this->prompt = '';
    }

    public function render()
    {
        return view('livewire.audio');
    }
}
