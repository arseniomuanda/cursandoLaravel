<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

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
        $products = Produto::paginate(9);
        return view('site.home', compact('products'));
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
        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:200'],
            'price' => ['required'],
            'cat' => ['numeric'],
            'qtd' => ['numeric']
        ]);
        $data['user'] = auth()->id();
        Produto::create($data);
        return redirect(route('admin.products'));
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
        $product = Produto::find($id);
        $product->delete();
        return redirect(route('admin.products'));
    }
}
