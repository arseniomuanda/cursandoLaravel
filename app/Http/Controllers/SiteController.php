<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Produto;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Produto::paginate(9);
        return view('site.home', compact('products'));
    }

    public function details($id)
    {
        $product = Produto::where('id', $id)->first();
        return view('site.details', compact('product'));
    }

    public function category($id)
    {
        $products = Produto::where('cat', $id)->paginate(9);
        $category = Category::find($id);
        return view('site.categoria', compact('products', 'category'));
    }

}
