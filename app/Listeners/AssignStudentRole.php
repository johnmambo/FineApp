<?php

namespace App\Listeners;

use App\Models\Role;
use App\Models\User;

use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AssignStudentRole
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    // public function handle(Registered $event)
    // {
    //     $user = $event->user;
    //     $studentRole = Role::where('name', 'student')->first();

    //     if ($studentRole && $user instanceof User) {
    //         $user->attachRole($studentRole);
    //     }
    // }
}
