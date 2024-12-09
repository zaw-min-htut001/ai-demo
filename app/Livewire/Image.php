<?php

namespace App\Livewire;

use App\AI\Assistant;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Image extends Component
{
    #[Validate('required|string|max:1000')]
    public string $description= '';

    public string $images ='';

    public function generate()
    {
        $this->validate();

        $url = Assistant::visualize($this->description);

        $this->images =$url;

        $this->description ='';
    }


    public function render()
    {
        return view('livewire.image');
    }
}
