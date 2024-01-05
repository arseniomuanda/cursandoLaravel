<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Produto;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    function __construct()
    {
        
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::paginate(5);
        $count = Brand::all()->count();
        return view('admin.brands', compact('brands', 'count'));
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
            'logo' => ['max:300'],
            'description' => ['max:800']
        ]);

        #TODO: Adicionar uma feature para validar os acessos epenas pemitir admin
        $data = $request->all();
        //dd($data);
        //salvar imagem usando laravel
        if ($request->logo) {
            $data['logo'] = $request->logo->store('brands');
        }

        Brand::create($data);
        return redirect(route('admin.brands'))->with('success', 'Marca adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
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
            $data['logo'] = $request->image->store('brands');
        }

        $brand = Brand::findOrFail($id);
        $brand->update($data);
        return redirect(route('admin.brands'))->with('success', 'Marca editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect(route('admin.brands'))->with('success', 'Marca deletada com sucesso!');
    }
}
