<?php

namespace App\Http\Controllers;

use App\Models\StockAccurate;
use App\Models\StockSale;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sales = StockSale::count();
        $accurate = StockAccurate::count();
        $complete = false;
        if ($sales == $accurate) {
            $complete = true;
        }
        return view('home', compact('complete'));
    }
}
