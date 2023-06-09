<?php

use App\Http\Livewire\Tweet\Create;
use App\Http\Livewire\Tweet\Timeline;
use App\Models\Tweet;
use App\Models\User;
use Livewire\Livewire;
use function Pest\Laravel\assertDatabaseCount;

it('should be able to create a tweet', function () {
    /** @var User $user */
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(Create::class)
        ->set('body', $body = 'This is my first tweet')
        ->call('tweet')
        ->assertEmitted('tweet::created');

    assertDatabaseCount(Tweet::class, 1);

    /** @var Tweet $tweet */
    $tweet = Tweet::query()->first();

    expect($tweet)
        ->body->toBe($body)
        ->created_by->toBe($user->id);
});

it('should make sure that only authenticated users can tweet', function () {
    Livewire::test(Create::class)
        ->set('body', 'This is my first tweet')
        ->call('tweet')
        ->assertForbidden();

    /** @var User $user */
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(Create::class)
        ->set('body', $body = 'This is my first tweet')
        ->call('tweet')
        ->assertEmitted('tweet::created');
});

test('body is requided', function () {
    /** @var User $user */
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(Create::class)
        ->call('tweet')
        ->assertHasErrors(['body' => 'required']);
});

test('the tweet body should have a max length of 140 characters', function () {
    /** @var User $user */
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(Create::class)
        ->set('body', str_repeat('a', 141))
        ->call('tweet')
        ->assertHasErrors(['body' => 'max']);
});

it('should show the tweet on the timeline', function () {
    /** @var User $user */
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(Create::class)
        ->set('body', $tweet = 'This is my first tweet')
        ->call('tweet')
        ->assertEmitted('tweet::created');

    Livewire::actingAs($user)
        ->test(Timeline::class)
        ->assertSee($tweet);
});

it('should reset body after tweeting', function () {
    /** @var User $user */
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(Create::class)
        ->set('body', 'This is my first tweet')
        ->call('tweet')
        ->assertEmitted('tweet::created')
        ->assertSet('body', null);
});
