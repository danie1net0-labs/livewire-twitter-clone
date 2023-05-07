<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;

class BlueSubscribeController extends Controller
{
    /** @throws Exception */
    public function __invoke(): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->user();

        $user->createOrGetStripeCustomer();

        return $user->newSubscription('default', 'price_1N2OISGeGLmzPRl9ITJlB68d')
            ->checkout()
            ->redirect();
    }
}
