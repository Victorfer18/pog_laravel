<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        $categorias = Categoria::all();
        $usersData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total'),
        ])->groupBy('ano')->orderBy('ano', 'asc')->get();
        foreach($usersData as $index){
            $ano[] = $index->ano;
            $total[] = $index->total;
        }

        foreach($categorias as $index){
            $catNome[] = "'".$index->name."'";
            $catTotal[] = Produto::where('id_categoria', $index->id)->count();
        };

        $catLabel = implode(',', $catNome);
        $catTotal = implode(',', $catTotal);

        $userLabel = "'Comparativo de cadastros de usuários'";

        $userAno = implode(',' , $ano);
        $userTotal = implode(',', $total);

        $quantidadeRows = $categorias->count();
        return view('admin.dashboard', compact('usuarios', 'userAno', 'userTotal', 'userLabel', 'catLabel', 'catTotal', 'quantidadeRows'));
    }
}
