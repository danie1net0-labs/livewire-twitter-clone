<?php

namespace App\Http\Livewire\Tweet;

use App\Models\Tweet;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Timeline extends Component
{
    public int $perPage = 10;

    protected function getListeners(): array
    {
        return [
            'tweet::created' => '$refresh',
        ];
    }

    public function render(): View
    {
        $tweets = Tweet::query()
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.tweet.timeline', [
            'tweets' => $tweets,
        ]);
    }

    public function loadMore(): void
    {
        $this->perPage += 10;
    }
}
