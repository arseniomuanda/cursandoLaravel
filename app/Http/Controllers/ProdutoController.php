<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $request->validate([
            'name' => ['required', 'min:2', 'max:200'],
            'price' => ['required'],
            'cat' => ['numeric'],
            'sku' => ['required', 'min:4'],
            'brand' => ['numeric'],
            'qtd' => ['numeric'],
            'image' => ['max:300'],
            'description' => ['max:800']
        ]);

        $data = $request->all();
        //salvar imagem usando laravel
        if ($request->image) {
            $data['image'] = $request->image->store('products');
        }

        $data['user'] = auth()->id();
        $data['slug'] = Str::slug($request->name);
        Produto::create($data);
        return redirect(route('admin.products'))->with('success', 'Producto adicionado com sucesso!');
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

        $request->validate([
            'name' => ['required', 'min:2', 'max:200'],
            'price' => ['required'],
            'cat' => ['numeric'],
            'brand' => ['numeric'],
            'qtd' => ['numeric'],
            'image' => ['max:300'],
            'description' => ['max:800']
        ]);

        $product = Produto::findOrFail($id);
        $this->authorize('verProduto', $product);

        $data = $request->all();
        //salvar imagem usando laravel
        if ($request->image) {
            $data['image'] = $request->image->store('products');
        }

        $data['user'] = auth()->id();
        $data['slug'] = Str::slug($request->name);

        // Encontre o usuário pelo ID

        // Atualize o usuário com os dados do request
        $product->update($data);
        return redirect(route('admin.products'))->with('success', 'Producto editado com sucesso! ' . $data['cat']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Produto::find($id);
        $product->delete();
        return redirect(route('admin.products'))->with('success', 'Producto deletado com sucesso!');
    }
}
