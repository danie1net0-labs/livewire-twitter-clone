<?php

namespace App\Http\Livewire\Tweet;

use App\Models\Tweet;
use Illuminate\View\View;
use Livewire\Component;

class Timeline extends Component
{
    protected function getListeners(): array
    {
        return [
            'tweet::created' => '$refresh',
        ];
    }

    public function render(): View
    {
        return view('livewire.tweet.timeline', [
            'tweets' => Tweet::query()->get(),
        ]);
    }
}
