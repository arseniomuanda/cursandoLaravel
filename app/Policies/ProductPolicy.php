<?php

namespace App\Policies;

use App\Models\Produto;
use App\Models\User;

class ProductPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function verProduto(User $user, Produto $produto)
    {
        return $user->id === $produto->user;
    }
}
