<?php

namespace App\Policies;

use App\Models\Board;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BoardPolicy
{
    use HandlesAuthorization;

    /**
     * Определите, может ли пользователь просматривать модель.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Board $board)
    {
        if ($board->user_id == $user->id) {
            return true;
        }
        return false;
    }
    /**
     * Определите, может ли пользователь редактировать модель.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Board $board)
    {
        if ($board->user_id == $user->id) {
            return true;
        }
        return false;
    }

    /**
     * Определите, может ли пользователь удалять модель.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Board $board)
    {
        if ($board->user_id == $user->id) {
            return true;
        }
        return false;
    }
}
