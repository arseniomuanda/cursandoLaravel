<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produto;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cart;
    function __construct()
    {
        $this->middleware(['auth', 'checkemail']);
        $this->cart = new Cart();
    }


    public function cartList()
    {
        $items = $this->cart->getContent()->sort();

        return view('site.cart', compact('items'));
    }

    public function salvarCarrinhoDB()
    {
        $items = \Cart::session(auth()->id())->getContent();
        foreach ($items as $item) {
            $carrinho = new Cart();
            $carrinho->user_id = auth()->id();
            $carrinho->produto_id = $item->id;
            $carrinho->quantidade = $item->quantity;
            $carrinho->save();
        }
        \Cart::session(auth()->id())->clear();
        return redirect()->back()->with('success', 'Carrinho salvo com sucesso!');
    }

    public function addItem(Request $request)
    {
        $product = Produto::find($request->id);

        $request->validate([
            'product' => 'required|numeric',
            'id' => 'required|numeric',
            'qdt' => 'required|numeric',
        ]);

        $data = $request->all();
    
        #TODO: verificar se já temos este item no carrinho de compras
        
        
        \Cart::session(auth()->id())->add(array(
                'id' => $request->id,
                'name' =>  $request->name,
                'price' =>  $request->price,
                'quantity' =>  $request->quantity,
                'attributes' => array(
                    'image' => $request->image
                ),
                'associatedModel' => $product
            ));

            return redirect()->route('site.cart')->with('success', 'Carrinho actualizado!');
    }

    public function remItem(Request $request)
    {
        \Cart::session(auth()->id())->remove($request->id);
        return redirect()->route('site.cart')->with('success', 'Carrinho actualizado!');
    }

    public function updateQuantity($id, Request $request)
    {
        $validated = $request->validate([
            'quantity' => 'required|numeric',
        ]);

        if ($validated) {
            \Cart::session(auth()->id())->update($id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                )
            ));
        }
        return redirect()->route('site.cart')->with('success', 'Carrinho actualizado!');
    }

    public function clearCart()
    {
        \Cart::session(auth()->id())->clear();
        return redirect()->route('site.cart')->with('info', 'Carrinho esvaziado.')->with('subjet', 'Certo!');
    }
}
