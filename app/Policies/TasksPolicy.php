<?php

namespace App\Policies;

use App\Models\Tasks;
use App\Models\User;
use http\Env\Response;

class TasksPolicy
{
    public function delete(User $user, Tasks $task)
    {
        return $user->id === $task->user_id;

    }
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
}
