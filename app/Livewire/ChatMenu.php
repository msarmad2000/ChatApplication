<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use Livewire\Update;
use App\Models\User;
use App\Models\ChatMessage;

class ChatMenu extends Component
{
    public $users;
    public $chats;
    public $activeChat;
    public $chatRecord;
    public $message;
    public $editMessageId;
    public $editedMessage;
    public $update= false;

    public function mount(){
        $this->chats = Auth::user()->chats;
        $this->activeChat = Auth::user()->chats()->latest()->first();
    }

    public function navigationClicked($chatId){
        $chatRecord = Auth::user()->chats()->where('chats.id', $chatId)->first();
        $this->activeChat = $chatRecord;
    }

    public function sendMessage(){
        $this->activeChat->messages()->create([
            'messages' => $this->message,
            'user_id' => Auth::user()->id,
        ]);
        $this->message = '';
        $this->activeChat->refresh();
    }
    public function refreshMessages(){
        $this->activeChat->refresh();
        $this->chats = Auth::user()->chats;
    }


    public function editMessage($messageId)
    {
        $this->editMessageId = $messageId;
        // dd($messageId);
        // $this->editedMessage = ChatMessage::findOrFail($messageId)->messages;
        $this->update = !$this->update;
    }

    public function delete(){
        $message = $this->activeChat->messages()->where('user_id', Auth::user()->id)->latest()->first();
        if ($message) {
            $message->delete();
        }
    }
    public function render()
    {
        return view('livewire.chat-menu');
    }
}
