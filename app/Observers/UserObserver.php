<?php

namespace App\Observers;

use App\Models\User;
use App\Services\UserService;
class UserObserver
{

    public function __construct(protected UserService $userService)
    {
    }
    public function created(User $user): void
    {
        if(! $user->username) {
            $user->username = $this->userService->generateUsername($user->name, $user->police_id);
        }
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
