<?php

namespace App\Http\Controllers;

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

}
