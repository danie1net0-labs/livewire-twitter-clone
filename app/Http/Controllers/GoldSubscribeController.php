<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;

class GoldSubscribeController extends Controller
{
    /** @throws Exception */
    public function __invoke(): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->user();

        $user->createOrGetStripeCustomer();

        if ($user->subscribed('verified-org')) {
            return $user->redirectToBillingPortal();
        }

        return $user->newSubscription('verified-org', 'price_1N5FWTGeGLmzPRl95nWLQTBP')
            ->checkout()
            ->redirect();
    }
}
