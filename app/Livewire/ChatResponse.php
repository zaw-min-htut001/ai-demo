<?php

namespace App\Livewire;

use App\AI\Assistant;
use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class ChatResponse extends Component
{
    public array $messages;

    public ?string $response = null;

    public function mount()
    {
        $this->getResponse();
    }

    public function getResponse()
    {
        $stream = Assistant::chat($this->messages);

        $this->response =$stream->choices[0]->message->content;

    }

    public function render()
    {
        return view('livewire.chat-response');
    }
}
