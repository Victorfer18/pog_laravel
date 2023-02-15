<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function cart_list(){
        $itens = \Cart::getContent();
        dd($itens);
    }

    public function add_itens_cart(Request $request){
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->qnt,
            'attributes' => array(
                'image' => $request->img
            )
        ]);
    }
}
