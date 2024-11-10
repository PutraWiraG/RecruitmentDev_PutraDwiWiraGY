<?php

namespace App\Livewire;

use App\Models\Feedback as ModelsFeedback;
use Livewire\Component;

class Feedback extends Component
{
    public $name, $email, $message;

    protected $rules = [
        'name' => 'required', 
        'email' => 'required', 
        'message' => 'required' 
    ];

    public function render()
    {
        return view('livewire.feedback', [
            'feedbacks' => ModelsFeedback::all()
        ]);
    }

    public function submit(){
        
        $validatedData = $this->validate();
        ModelsFeedback::create($validatedData);
        $this->reset([
            'name', 'email', 'message'
        ]);
        session()->flash('success', 'Berhasil Memberikan Feedback');
    }
}
