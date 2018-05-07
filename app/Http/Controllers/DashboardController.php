<?php

namespace App\Http\Controllers;

use App\Product;
use App\Distributor;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distributors = count(Distributor::all());
        $products = count(Product::all());

        return view('home', compact('distributors', 'products'));
    }
}
