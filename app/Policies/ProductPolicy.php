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
        $email = auth()->user()->email;
        $user_name = explode('@', $email)[0];
        return ($user->id === $produto->user && $user_name === 'admin');
    }
}
