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
        $distributors = Distributor::all();

        return view('transactions.create', compact('products', 'distributors'));
    }

    public function store(Request $request) {
        $distributor = $request->input('distributor');
        $date = $request->input('date');
        $product = $request->input('product');
        $quantity = $request->input('quantity');

        $transaction = new Transaction();
        $transaction->distributor_id = $distributor;
        $transaction->product_id = $product;
        $transaction->quantity = $quantity;
        $transaction->date = $date;
        $transaction->save();

        return redirect()->back()->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function show() {

    }

    public function update(Request $request, $id) {

    }

    public function destroy($id) {

    }
}
