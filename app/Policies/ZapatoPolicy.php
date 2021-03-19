<?php

namespace App\Policies;

use App\User;
use App\Zapato;
use Illuminate\Auth\Access\HandlesAuthorization;

class ZapatoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Zapato  $zapato
     * @return mixed
     */
    public function view(User $user, Zapato $zapato)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Zapato  $zapato
     * @return mixed
     */
    public function update(User $user, Zapato $zapato)
    {
        //verificar usuario
        return $user->id == $zapato->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Zapato  $zapato
     * @return mixed
     */
    public function delete(User $user, Zapato $zapato)
    {
        //verificar usuario
        return $user->id == $zapato->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Zapato  $zapato
     * @return mixed
     */
    public function restore(User $user, Zapato $zapato)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Zapato  $zapato
     * @return mixed
     */
    public function forceDelete(User $user, Zapato $zapato)
    {
        //
    }
}
