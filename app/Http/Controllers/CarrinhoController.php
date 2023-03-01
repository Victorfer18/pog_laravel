<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function cart_list(){
        $itens = \Cart::getContent();
        return view('site.carrinho', compact('itens'));
    }

    public function add_itens_cart(Request $request){
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => abs($request->qnt),
            'attributes' => array(
                'image' => $request->img
            )
        ]);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto adicionado com sucesso!');
    }

    public function removeCart(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto removido com sucesso!');
    }

    public function refreshCart(Request $request){
        \Cart::update($request->id, ['quantity' => ['relative' => false, 'value' => abs($request->quantity)]]);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto atualizado com sucesso!');
    }

    public function clearCart(){
        \Cart::clear();
        return redirect()->route('site.carrinho');
    }
}
