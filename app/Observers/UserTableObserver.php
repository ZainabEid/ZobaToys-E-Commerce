<?php

namespace App\Observers;

use App\Models\User;

class UserTableObserver
{
    
    public function created(User $user)
    {
        $user->cart()->create([]);
    }

    
    public function updated(User $user)
    {
        //
    }

   
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
