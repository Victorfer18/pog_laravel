<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $produtos = Produto::paginate(3);

        return view('site.home', compact('produtos'));
    }

    public function details(string $slug)
    {
        $produto = Produto::where('slug', $slug)->first();

        return view('site.details', compact('produto'));
        // return json_encode([
        //     'next' => true,
        //     'message' => 'Product Details',
        //     'payload' => $produtos
        // ]);
    }

    public function categoria(int $id)
    {
        $categoria = Categoria::find($id);
        $produto = Produto::where('id_categoria', $id)->get();

        return view('site.categoria', compact('produto', 'categoria'));
        // return json_encode([
        //     'next' => true,
        //     'message' => 'Product Details',
        //     'payload' => $produtos
        // ]);
    }
}
