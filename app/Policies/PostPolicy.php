<?php

namespace App\Policies;

use App\Policies\Traits\HandlesFilamentPermissions;

class PostPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }


    use HandlesFilamentPermissions;
    protected string $entity = 'post';
}
