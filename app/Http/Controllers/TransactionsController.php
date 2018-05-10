<?php

namespace App\Http\Controllers;

use App\Order;
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
        $price = $request->input('price');
        $quantity = $request->input('quantity');
        $count = count($product);
        
        $transaction = new Transaction();
        $transaction->distributor_id = $distributor;
        $transaction->date = $date;
        $transaction->save();
        
        for($i=0; $i < $count; $i++) {
            $order = new Order();
            $order->transaction_id = $transaction->id;
            $order->product_id = $product[$i];
            $order->price = Product::find($product[$i])->price;
            $order->quantity = $quantity[$i];
            $order->save();
        }

        return redirect()->back()->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function show($id) {
        $transaction = Transaction::find($id);

         return view('transactions.show', compact('transaction'));
    }

    public function update(Request $request, $id) {

    }

    public function destroy($id) {
        $transaction = Transaction::destroy($id);

        return redirect()->back()->with('success', 'Data transaksi berhasil dihapus.');
    }

    public function search(Request $request) {
        $search = $request->input('search');
        $transactions = Transaction::where('name', 'like', '%'.$search.'%')->paginate(10);

        if(count($transactions) == 0) {
            return view('transactions.index', compact('transactions'))->with('error', 'Pencarian '.$search.' tidak ditemukan.');
        }

        return view('transactions.index', compact('transactions'));
    }
}
