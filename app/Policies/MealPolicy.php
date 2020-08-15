<?php

namespace App\Policies;

use App\Meal;
use App\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class MealPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the admin can view any models.
     *
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function viewAny(Admin $admin)
    {
        //
    }

    /**
     * Determine whether the admin can view the model.
     *
     * @param  \App\Admin  $admin
     * @param  \App\Meal  $meal
     * @return mixed
     */
    public function view(Admin $admin, Meal $meal)
    {
        return $admin->id === $meal->admin_id;
    }

    /**
     * Determine whether the admin can create models.
     *
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function create(Admin $admin)
    {
        //
    }

    /**
     * Determine whether the admin can update the model.
     *
     * @param  \App\Admin  $admin
     * @param  \App\Meal  $meal
     * @return mixed
     */
    public function update(Admin $admin, Meal $meal)
    {
        return $admin->id === $meal->admin_id;
    }

    /**
     * Determine whether the admin can delete the model.
     *
     * @param  \App\Admin  $admin
     * @param  \App\Meal  $meal
     * @return mixed
     */
    public function delete(Admin $admin, Meal $meal)
    {
        return $admin->id === $meal->admin_id;
    }

    /**
     * Determine whether the admin can restore the model.
     *
     * @param  \App\Admin  $admin
     * @param  \App\Meal  $meal
     * @return mixed
     */
    public function restore(Admin $admin, Meal $meal)
    {
        //
    }

    /**
     * Determine whether the admin can permanently delete the model.
     *
     * @param  \App\Admin  $admin
     * @param  \App\Meal  $meal
     * @return mixed
     */
    public function forceDelete(Admin $admin, Meal $meal)
    {
        //
    }
}
