<?php

namespace App\Policies;

use App\Models\User;
use App\Policies\Traits\HandlesFilamentPermissions;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    use HandlesFilamentPermissions;
    protected string $entity = 'user';

    // public function update(User $user, User $model): bool
    // {
    //     if ($model->hasRole('Super_Admin') && !$user->hasRole('Super_Admin')) {
    //         return false;
    //     }

    //     return $this->can($user, 'update');
    // }

    // public function delete(User $user, User $model): bool
    // {
    //     if ($model->hasRole('Super_Admin') && !$user->hasRole('Super_Admin')) {
    //         return false;
    //     }

    //     return $this->can($user, 'delete');
    // }

    // public function deleteAny(User $user): bool
    // {
    //     if (!$user->hasRole('Super_Admin')) {
    //         return false;
    //     }

    //     return $this->can($user, 'delete');
    // }

}
