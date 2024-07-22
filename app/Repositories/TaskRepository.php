<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Tasks;
use App\Models\Specifications;
use Illuminate\Support\Collection;

class TaskRepository
{
    public function forUser(User $user)
    {

        return Tasks::where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();
    }

    public function forUserRevers(User $user)
    {

        return Tasks::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
