<?php

namespace App\Policies;

use App\Policies\Traits\HandlesFilamentPermissions;

class PermissionPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    use HandlesFilamentPermissions;
    protected string $entity = 'permission';
}
