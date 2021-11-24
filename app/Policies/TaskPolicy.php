<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Task;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * 指定されたユーザーのタスクの時削除可能
     * 
     * @param User $user
     * @param Task $task
     * @return bool
     */
    public function todoDelete(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }
}
