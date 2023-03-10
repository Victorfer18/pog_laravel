<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $usuarios = User::all();

        $usersData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total'),
        ])->groupBy('ano')->orderBy('ano', 'asc')->get();
        foreach($usersData as $index){
            $ano[] = $index->ano;
            $total[] = $index->total;
        }

        $userLaber = "'Comparativo de cadastros de usuários'";

        $userAno = implode(',' , $ano);
        $userTotal = implode(',', $total);
        dd($usersData);

        return view('admin.dashboard', compact('usuarios'));
    }


}
