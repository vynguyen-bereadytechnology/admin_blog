<?php

namespace App\Policies\Traits;

use App\Models\User;
trait HandlesFilamentPermissions
{
    protected function can(User $user, string $action): bool
    {
        $permission = "{$this->entity}.{$action}";

        return $user->can($permission);
    }

    protected function checkSuperAdmin(User $user, $model): bool
    {
        // Nếu model là Super_Admin nhưng user không phải Super_Admin
        if ($model->hasRole('Super_Admin') && !$user->hasRole('Super_Admin')) {
            return false;
        }
        return true;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // return $this->can($user, 'view_any');
        return $this->can($user, 'view');

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, $model): bool
    {
        return $this->can($user, 'view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $this->can($user, 'create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, $model): bool
    {
        if (!$this->checkSuperAdmin($user, $model)) {
            return false;
        }
        return $this->can($user, 'update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, $model): bool
    {
        if (!$this->checkSuperAdmin($user, $model)) {
            return false;
        }
        return $this->can($user, 'delete');
    }

    /**
     * Determine whether the user can delete multiple models.
     */
    public function deleteAny(User $user): bool
    {
        // return $this->can($user, 'delete_any');
        if (!$user->hasRole('Super_Admin')) {
            return false;
        }
        return $this->can($user, 'delete');
    }

    /**
     * Determine whether the user can permanently delete multiple models.
     */
    public function forceDeleteAny(User $user): bool
    {
        // return $this->can($user, 'force_delete_any');
        return $this->can($user, 'force_delete');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, $model): bool
    {
        return $this->can($user, 'force_delete');
    }

    /**
     * Determine whether the user can restore multiple models.
     */
    public function restoreAny(User $user): bool
    {
        // return $this->can($user, 'restore_any');
        return $this->can($user, 'restore');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, $model): bool
    {
        return $this->can($user, 'restore');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    // public function replicate(User $user, $model): bool
    // {
    //     return $this->can($user, 'replicate');
    // }

    /**
     * Determine whether the user can reorder models.
     */
    // public function reorder(User $user): bool
    // {
    //     return $this->can($user, 'reorder');
    // }
}
