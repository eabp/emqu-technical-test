<?php

namespace App\Policies;

use App\Models\System;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SystemPolicy
{
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, System $system): Response
    {
        return $system->latencyTestings->count() === 0
            ? Response::allow()
            : Response::deny('Cannot be deleted as it has tests done!');
    }
}
