<?php

namespace App\Http\Livewire\Tweet;

use App\Models\Tweet;
use Illuminate\Contracts\View\View;
use Livewire\Component;

/**
 * @property-read int $count
 */
class ShowTweets extends Component
{
    protected $listeners = [
        'echo:tweets,TweetCreated' => '$refresh',
    ];

    public function render(): View
    {
        return view('livewire.tweet.show-tweets');
    }

    public function getCountProperty(): int
    {
        return Tweet::query()
            ->where('id', '>', session('last-tweet') ?? $this->lastTweetId())
            ->count();
    }

    public function more(): void
    {
        $this->emitTo(Timeline::class, 'show::more');

        session()->put('last-tweet', $this->lastTweetId());
    }

    private function lastTweetId(): int
    {
        return Tweet::query()->latest()->first()->id;
    }
}
