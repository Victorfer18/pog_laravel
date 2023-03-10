<?php

namespace App\Policies;

use App\Models\Produto;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;

class ProdutoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function verProduto(User $user, Produto $produto){
        return $user->id == $produto->id_user;
    }
}
