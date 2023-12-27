<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BashBoardController extends Controller
{
    public function __construct()
    {
        //Tambem podemos usar uma lista de metodos dentro do only ou usar o except
        $this->middleware(['auth', 'checkemail'])->only('index');
    }
    public function index()
    {
        $users = User::all()->count();
        $productsData = Produto::select(
            'categories.name AS category',
            DB::raw('COUNT(*) as total')
        )
            ->join('categories', 'produtos.cat', '=', 'categories.id')
            ->groupBy('categories.name')
            ->get();


        foreach ($productsData as $value) {
            $productLabals[] = $value->category;
            $productTotals[] = $value->total;
        }

        $usersData = User::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total')
        )->groupBy('month')
            ->orderBy('month', 'asc')->where('YEAR(created_at)', date('Y'))->get();

        foreach ($usersData as $value) {
            $userLabels[] = $value->category;
            $userTotals[] = $value->total;
        }

        #processa as variaveis convertendo em string
        $productLabals = implode(',', $productLabals);
        $productTotals = implode(',',  $productTotals);

        $userLabel = 'Aquisição de utilizadores do ano de ' . date('Y');
        $userLabels = implode(',', $userLabels);
        $userTotals = implode(',',  $userTotals);

        return view('admin.dashboard', compact('users', 'productsLabals'));
    }
}
