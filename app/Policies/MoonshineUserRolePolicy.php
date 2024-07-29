<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\MoonshineUserRole;
use MoonShine\Models\MoonshineUser;

class MoonshineUserRolePolicy
{
    use HandlesAuthorization;

    public function viewAny(MoonshineUser $user): bool
    {
        return $user->isSuperUser();
    }

    public function view(MoonshineUser $user): bool
    {
        return $user->isSuperUser();
    }

    public function create(MoonshineUser $user): bool
    {
        return $user->isSuperUser();
    }

    public function update(MoonshineUser $user): bool
    {
        return $user->isSuperUser();
    }

    public function delete(MoonshineUser $user): bool
    {
        return $user->isSuperUser();
    }

    public function restore(MoonshineUser $user): bool
    {
        return $user->isSuperUser();
    }

    public function forceDelete(MoonshineUser $user): bool
    {
        return $user->isSuperUser();
    }

    public function massDelete(MoonshineUser $user): bool
    {
        return $user->isSuperUser();
    }
}
