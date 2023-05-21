<?php

namespace App\Http\Livewire\Tweet;

use App\Models\Tweet;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

/**
 * @property-read Collection $tweets
 */
class Timeline extends Component
{
    public int $perPage = 10;

    protected function getListeners(): array
    {
        return [
            'show::more' => '$refresh',
        ];
    }

    public function getTweetsProperty(): LengthAwarePaginator
    {
        $tweets = Tweet::query()
            ->latest()
            ->paginate($this->perPage);

        session()->put('last-tweet', $tweets->first()->id);

        return $tweets;
    }


    public function render(): View
    {
        return view('livewire.tweet.timeline');
    }

    public function loadMore(): void
    {
        $this->perPage += 10;
    }
}
