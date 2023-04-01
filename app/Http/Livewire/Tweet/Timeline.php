<?php

namespace App\Http\Livewire\Tweet;

use App\Models\Tweet;
use Illuminate\View\View;
use Livewire\Component;

class Timeline extends Component
{
    public function render(): View
    {
        return view('livewire.tweet.timeline', [
            'tweets' => Tweet::query()->get(),
        ]);
    }
}
