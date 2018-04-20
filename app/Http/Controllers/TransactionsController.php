<?php

namespace App\Http\Controllers;

use App\Product;
use App\Distributor;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $transactions = Transaction::paginate(10);

        return view('transactions.index', compact('transactions'));
    }

    public function create() {
        $products = Product::all();
        $distributor = Distributor::all();

        return view('transactions.create', compact('products', 'distributors'));
    }

    public function store(Request $request) {

    }

    public function show() {

    }

    public function update(Request $request, $id) {

    }

    public function destroy($id) {

    }
}
