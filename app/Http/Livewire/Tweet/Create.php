<?php

namespace App\Http\Livewire\Tweet;

use App\Events\TweetCreated;
use App\Models\Tweet;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Create extends Component
{
    use AuthorizesRequests;

    public string $body = '';

    public function render(): View
    {
        return view('livewire.tweet.create');
    }

    public function tweet(): void
    {
        $this->authorize('create', Tweet::class);

        $this->validate([
            'body' => ['required', 'max:140'],
        ]);

        Tweet::query()->create([
            'body' => $this->body,
            'created_by' => auth()->id(),
        ]);

        $this->reset();

        $this->emit('tweet::created');

        TweetCreated::dispatch();
    }
}
