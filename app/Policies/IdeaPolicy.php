<?php

namespace App\Policies;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Auth\Access\Response;

// php artisan make:policy IdeaPolicy --model=Idea

class IdeaPolicy
{


    public function delete(User $user, Idea $idea): bool
    {
        return ($user->is_admin || $user->id === $idea->user_id);
    }


}
