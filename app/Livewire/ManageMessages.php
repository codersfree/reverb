<?php

namespace App\Livewire;

use App\Events\MessageSent;
use App\Models\Message;
use Livewire\Component;

class ManageMessages extends Component
{
    public $body;
    public $comments;

    public function mount()
    {
        $this->getComments();
    }

    public function getListeners()
    {
        return [
            'echo:messages,MessageSent' => 'getComments'
        ];
    }

    public function getComments()
    {
        $this->comments = Message::latest()->get();
    }

    public function save()
    {
        $this->validate([
            'body' => 'required'
        ]);

        Message::create([
            'body' => $this->body,
            'user_id' => auth()->id()
        ]);

        MessageSent::dispatch();

        $this->getComments();

        $this->reset('body');
    }
    
    public function render()
    {
        return view('livewire.manage-messages');
    }
}
