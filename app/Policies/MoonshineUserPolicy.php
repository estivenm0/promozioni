<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use MoonShine\Models\MoonshineUser;

class MoonshineUserPolicy
{
    use HandlesAuthorization;

    public function viewAny(MoonshineUser $user): bool
    {
        return $user->isSuperUser();
    }

    public function view(MoonshineUser $user, MoonshineUser $item): bool
    {
        return $user->isSuperUser();
    }

    public function create(MoonshineUser $user): bool
    {
        return $user->isSuperUser();
    }

    public function update(MoonshineUser $user, MoonshineUser $item): bool
    {
        return $user->isSuperUser();
    }

    public function delete(MoonshineUser $user, MoonshineUser $item): bool
    {
        return $user->isSuperUser();
    }

    public function restore(MoonshineUser $user, MoonshineUser $item): bool
    {
        return $user->isSuperUser();
    }

    public function forceDelete(MoonshineUser $user, MoonshineUser $item): bool
    {
        return $user->isSuperUser();
    }

    public function massDelete(MoonshineUser $user): bool
    {
        return $user->isSuperUser();
    }
}
