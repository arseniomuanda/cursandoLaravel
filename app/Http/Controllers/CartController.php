<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        $items = \Cart::getContent();

        return view('site.cart', compact('items'));
    }

    public function addItem(Request $request)
    {
        $product = Produto::find($request->id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'image' => 'required',
            'id' => 'required|numeric',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        if ($validated) {
            \Cart::add(array(
                'id' => $request->id,
                'name' =>  $request->name,
                'price' =>  $request->price,
                'quantity' =>  $request->quantity,
                'attributes' => array(
                    'image' => $request->image
                ),
                //'associatedModel' => 'Produto'
            ));

            return redirect()->route('site.cart')->with('success', 'Carrinho actualizado!');
        }
    }

    public function remItem(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->route('site.cart')->with('success', 'Carrinho actualizado!');
    }
}
