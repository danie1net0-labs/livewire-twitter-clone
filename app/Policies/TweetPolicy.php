<?php

namespace App\Policies;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TweetPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Tweet $tweet): bool
    {
         return true;
    }

    public function create(): bool
    {
        return auth()->check();
    }

    public function update(User $user, Tweet $tweet): bool
    {
         return true;
    }

    public function delete(User $user, Tweet $tweet): bool
    {
         return true;
    }

    public function restore(User $user, Tweet $tweet): bool
    {
         return true;
    }

    public function forceDelete(User $user, Tweet $tweet): bool
    {
         return true;
    }
}
