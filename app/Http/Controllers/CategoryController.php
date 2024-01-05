<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(5);
        $count = Category::all()->count();
        return view('admin.brands', compact('brands', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:2', 'max:200'],
            'logo' => ['max:300'],
            'description' => ['max:800']
        ]);

        #TODO: Adicionar uma feature para validar os acessos epenas pemitir admin
        $data = $request->all();
        //dd($data);
        //salvar imagem usando laravel
        if ($request->logo) {
            $data['logo'] = $request->logo->store('categories');
        }

        Category::create($data);
        return redirect(route('admin.categories'))->with('success', 'Categoria adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => ['required', 'min:2', 'max:200'],
            'logo' => ['max:300'],
            'description' => ['max:800']
        ]);
        #TODO: Adicionar uma feature para validar os acessos epenas pemitir admin

        $data = $request->all();
        //salvar imagem usando laravel
        if ($request->image) {
            $data['logo'] = $request->image->store('categories');
        }

        $category = Category::findOrFail($id);
        $category->update($data);
        return redirect(route('admin.categories'))->with('success', 'Categoria editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect(route('admin.brands'))->with('success', 'Categoria deletada com sucesso!');
    }
}
