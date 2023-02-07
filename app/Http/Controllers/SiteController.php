<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produto;

class SiteController extends Controller
{
    public function index()
    {
        $produtos = Produto::paginate(3);

        return view('site.home', compact('produtos'));
    }

}
