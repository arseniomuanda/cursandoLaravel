<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BashBoardController extends Controller
{
    public function __construct()
    {
        //Tambem podemos usar uma lista de metodos dentro do only ou usar o except
        $this->middleware('auth')->only('index');
    }
    public function index()
    {
        return view('admin.dashboard');
    }
}
