<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    protected $model;
    function __construct()
    {
        $this->model = new Produto();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* $data = [
            'nome' => "Arsenio",
            'idade' => 23,
            'html' => "<h1>oi eu estou a testar</h1>"
        ]; */


        
        $products = Produto::all();
        return view('site.home', compact('products'));
        /* return dd($this->model->all()); */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
