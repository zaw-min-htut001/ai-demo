<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use OpenAI\Laravel\Facades\OpenAI;


class Chat extends Component
{
    #[Validate('required|string|max:1000')]
    public string $body= '';

    public array $messages= [];

    public function send()
    {
        $this->validate();

        $this->messages[] = ["role"=> "user", "content"=> $this->body];

        $this->messages[] = ["role"=> "assistant", "content"=> ""];

        $this->body ='';

        $this->dispatch('scroll-bottom');
    }

    public function mount()
    {
        $this->messages[] = ["role"=> "system", "content"=> "You are a helpful assistant starting with Mingalarpar"];
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
