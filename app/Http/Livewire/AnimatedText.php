<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AnimatedText extends Component
{
    public $text = 'Vila Lux: Your gateway to the authentic Ohrid experience.';

    public function render()
    {
        return view('livewire.animated-text');
    }
}
