<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        $items = \Cart::getContent()->sort();

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
                'quantity' =>  abs($request->quantity),
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

    public function updateQuantity($id, Request $request)
    {
        $validated = $request->validate([
            'quantity' => 'required|numeric',
        ]);

        if ($validated) {
            \Cart::update($id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => abs($request->quantity)
                )
            ));
        }
        return redirect()->route('site.cart')->with('success', 'Carrinho actualizado!');
    }

    public function clearCart()
    {
        \Cart::clear();
        return redirect()->route('site.cart')->with('info', 'Carrinho esvaziado.')->with('subjet', 'Certo!');
    }
}
