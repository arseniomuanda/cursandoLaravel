<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produto;
use App\Models\User;
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
        $user = User::find(auth()->id());

        $cart = $user->cart;

        $total = 0;
        foreach ($user->cart as $item) {
            $total += $item->subtotal();
        }
        return view('site.cart', compact('cart', 'total'));
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
        $request->validate([
            'product' => 'required|numeric',
            'qtd' => 'required|numeric',
        ]);

        $data = $request->all();
        $data['user'] = auth()->id();

        if (Cart::where('product', $request->product)->where('user', auth()->id())->get()->count() > 0) {
            $cart = Cart::where('product', $request->product)->where('user', auth()->id())->first();
            //dd($cart);
            $data['qtd'] = (int) $cart->qtd + (int) $request->qtd;
            $cart->update($data);
        } else {
            Cart::create($data);
        }

        return redirect()->route('site.cart')->with('success', 'Carrinho actualizado!');
    }

    public function remItem(int $id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->route('site.cart')->with('success', 'Carrinho actualizado!');
    }

    public function updateQuantity($id, Request $request)
    {
        $validated = $request->validate([
            'qtd' => 'required|numeric',
        ]);

        $data = $request->all();
        $cart = Cart::find($id);

        $cart->update($data);
        return redirect()->route('site.cart')->with('success', 'Carrinho actualizado!');
    }

    public function clearCart()
    {
        Cart::where('user', auth()->id())->delete();
        return redirect()->route('site.cart')->with('info', 'Carrinho esvaziado.')->with('subjet', 'Certo!');
    }
}
