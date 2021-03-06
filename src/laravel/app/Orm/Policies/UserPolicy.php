<?php

namespace App\Orm\Policies;

use App\Orm\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Orm\User  $user
     * @param  \App\Orm\User  $model
     * @return mixed
     */
    public function index(User $user)
    {
        return $user->hasPolicy(__METHOD__);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Orm\User  $user
     * @param  \App\Orm\User  $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        return $user->hasPolicy(__METHOD__);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPolicy(__METHOD__);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Orm\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        return $user->hasPolicy(__METHOD__) or $user->isSameUser($model);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Orm\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        return $user->hasPolicy(__METHOD__);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Orm\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Orm\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        //
        return true;
    }
}
