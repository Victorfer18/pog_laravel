<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
        // Gate::authorize('ver-produto', $produto);
        // $this->authorize('ver-produto', $produto);
        if (Gate::allows('ver-produto', $produto)) {
            return view('site.details', compact('produto'));
        }
        if (Gate::denies('ver-produto', $produto)) {
            return redirect()->route('site.index');
        }
        return view('site.details', compact('produto'));
    }

    public function categoria(int $id)
    {
        $categoria = Categoria::find($id);
        $produto = Produto::where('id_categoria', $id)->get();

        return view('site.categoria', compact('produto', 'categoria'));
    }
}
