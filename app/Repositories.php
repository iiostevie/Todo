<?php


namespace App\Repositories;

use App\User;
use App\Task;

class TaskRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param User $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return Task::where('userid', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
}
