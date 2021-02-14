<?php

namespace App\Policies;

use App\User;
use App\LocationMap;
use Illuminate\Auth\Access\HandlesAuthorization;

class LocationMapPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the outlet.
     *
     * @param  \App\User  $user
     * @param  \App\LocationMap  $outlet
     * @return mixed
     */
    public function view(User $user, LocationMap $outlet)
    {
        // Update $user authorization to view $outlet here.
        return true;
    }

    /**
     * Determine whether the user can create outlet.
     *
     * @param  \App\User  $user
     * @param  \App\LocationMap  $outlet
     * @return mixed
     */
    public function create(User $user, LocationMap $outlet)
    {
        // Update $user authorization to create $outlet here.
        return true;
    }

    /**
     * Determine whether the user can update the outlet.
     *
     * @param  \App\User  $user
     * @param  \App\LocationMap  $outlet
     * @return mixed
     */
    public function update(User $user, LocationMap $outlet)
    {
        // Update $user authorization to update $outlet here.
        return true;
    }

    /**
     * Determine whether the user can delete the outlet.
     *
     * @param  \App\User  $user
     * @param  \App\LocationMap  $outlet
     * @return mixed
     */
    public function delete(User $user, LocationMap $outlet)
    {
        // Update $user authorization to delete $outlet here.
        return true;
    }
}
