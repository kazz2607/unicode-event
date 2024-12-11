<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function creating(User $user): void
    {
        echo 'creating';
    }

    public function created(User $user): void
    {
        echo 'created';
    }

    public function saving(User $user){
        echo 'saving';
    }

    public function save(User $user){
        echo 'save';
    }

    public function updating(User $user){
        echo 'updating';
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        echo 'updated';
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        echo 'deleted';
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        echo 'restored';
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        echo 'forceDeleted';
    }
}
