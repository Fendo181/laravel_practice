<?php

namespace App\Policies;

use App\User;
use App\Todo;
use Illuminate\Auth\Access\HandlesAuthorization;

class TodoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any todo.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the todo.
     *
     * @param  App\User  $user
     * @param  App\Todo  $todo
     * @return bool
     */
    public function view(User $user, Todo $todo)
    {
        return false;
    }

    /**
     * Determine whether the user can create a todo.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the todo.
     *
     * @param  App\User  $user
     * @param  App\Todo  $todo
     * @return bool
     */
    public function update(User $user, Todo $todo)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the todo.
     *
     * @param  App\User  $user
     * @param  App\Todo  $todo
     * @return bool
     */
    public function delete(User $user, Todo $todo)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the todo.
     *
     * @param  App\User  $user
     * @param  App\Todo  $todo
     * @return bool
     */
    public function restore(User $user, Todo $todo)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the todo.
     *
     * @param  App\User  $user
     * @param  App\Todo  $todo
     * @return bool
     */
    public function forceDelete(User $user, Todo $todo)
    {
        return false;
    }
}
