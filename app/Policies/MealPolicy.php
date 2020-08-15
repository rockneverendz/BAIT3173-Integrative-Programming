<?php

namespace App\Policies;

use App\Meal;
use App\Staff;
use Illuminate\Auth\Access\HandlesAuthorization;

class MealPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the staff can view any models.
     *
     * @param  \App\Staff  $staff
     * @return mixed
     */
    public function viewAny(Staff $staff)
    {
        //
    }

    /**
     * Determine whether the staff can view the model.
     *
     * @param  \App\Staff  $staff
     * @param  \App\Meal  $meal
     * @return mixed
     */
    public function view(Staff $staff, Meal $meal)
    {
        return $staff->id === $meal->staff_id;
    }

    /**
     * Determine whether the staff can create models.
     *
     * @param  \App\Staff  $staff
     * @return mixed
     */
    public function create(Staff $staff)
    {
        //
    }

    /**
     * Determine whether the staff can update the model.
     *
     * @param  \App\Staff  $staff
     * @param  \App\Meal  $meal
     * @return mixed
     */
    public function update(Staff $staff, Meal $meal)
    {
        return $staff->id === $meal->staff_id;
    }

    /**
     * Determine whether the staff can delete the model.
     *
     * @param  \App\Staff  $staff
     * @param  \App\Meal  $meal
     * @return mixed
     */
    public function delete(Staff $staff, Meal $meal)
    {
        return $staff->id === $meal->staff_id;
    }

    /**
     * Determine whether the staff can restore the model.
     *
     * @param  \App\Staff  $staff
     * @param  \App\Meal  $meal
     * @return mixed
     */
    public function restore(Staff $staff, Meal $meal)
    {
        //
    }

    /**
     * Determine whether the staff can permanently delete the model.
     *
     * @param  \App\Staff  $staff
     * @param  \App\Meal  $meal
     * @return mixed
     */
    public function forceDelete(Staff $staff, Meal $meal)
    {
        //
    }
}
