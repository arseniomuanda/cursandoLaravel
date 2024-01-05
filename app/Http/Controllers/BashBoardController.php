<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BashBoardController extends Controller
{
    public function __construct()
    {
        //Tambem podemos usar uma lista de metodos dentro do only ou usar o except
        /* $this->middleware(['auth', 'checkemail'])->only('index'); */
        $this->middleware(['auth', 'checkemail']);
    }

    public function index()
    {
        $users = User::all()->count();
        /* $productsData = Produto::select(
            DB::raw('categories.name as category'),
            DB::raw('COUNT(*) as total')
        )
            ->join('categories', 'produtos.cat', '=', 'categories.id')
            ->groupBy('categories.name')
            ->get(); */
        $productsData = Category::with('products')->get();
        $productTotals = [];
        $productCat = [];

        foreach ($productsData as $value) {
            $productCat[] = "'" . ucfirst($value->category) . "'";
            $productTotals[] = $value->products()->count();
        }

        $usersData = User::select(
            DB::raw('MONTH(created_at) AS month'),
            DB::raw('COUNT(*) AS total')
        )
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->whereYear('created_at', date('Y'))
            ->get();
        $userMes = [];
        $userTotals = [];
        $userTotals = [];
        foreach ($usersData as $value) {

            switch ($value->month) {
                case '1':
                    $userMes[] = "'Janeiro'";
                    break;
                case '2':
                    $userMes[] = "'Fevereiro'";
                    break;
                case '3':
                    $userMes[] = "'Março'";
                    break;
                case '4':
                    $userMes[] = "'Abril'";
                    break;
                case '5':
                    $userMes[] = "'Maio'";
                    break;
                case '6':
                    $userMes[] = "'Junho'";
                    break;
                case '7':
                    $userMes[] = "'Julho'";
                    break;
                case '8':
                    $userMes[] = "'Agosto'";
                    break;
                case '9':
                    $userMes[] = "'Setembro'";
                    break;
                case '10':
                    $userMes[] = "'Outubro'";
                    break;
                case '11':
                    $userMes[] = "'Novembro'";
                    break;
                case '12':
                    $userMes[] = "'Dezembro'";
                    break;
                default:
                    # code...
                    break;
            }
            $userTotals[] = $value->total;
        }

        #processa as variaveis convertendo em string
        $productLabel = 'Categoria de produtos';
        $productCat = implode(',', $productCat);
        $productTotals = implode(',',  $productTotals);

        $userLabel = 'Aquisição de utilizadores do ano de ' . date('Y');
        $userMes = implode(',', $userMes);
        $userTotals = implode(',',  $userTotals);

        return view('admin.dashboard', compact('users', 'productCat', 'productTotals', 'productLabel', 'userLabel', 'userMes', 'userTotals'));
    }

    public function products()
    {
        $products = Produto::where('user', auth()->id())->paginate(5);
        $count = Produto::where('user', auth()->id())->get()->count();
        return view('admin.products', compact('products', 'count'));
    }

    public function brands()
    {
        $brands = Brand::paginate(5);
        $count = Brand::all()->count();
        return view('admin.brands', compact('brands', 'count'));
    }


    public function categories()
    {
        $categories = Category::paginate(5);
        $count = Category::all()->count();
        return view('admin.categories', compact('categories', 'count'));
    }
}
