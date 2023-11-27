<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(){
        echo 'index';
    }

    public function show($id){
        echo "my pruduct ID is {$id}";
    }
}
