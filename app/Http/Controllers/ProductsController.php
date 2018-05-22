<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $products = Product::paginate(15);

        return view('products.index', compact('products'));
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        $name = $request->input('name');
        $sku = $request->input('sku');
        $description = $request->input('description');
        $price = $request->input('price');

        $request->validate([
            'sku' => 'required|unique:products,sku',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ], [
            'sku.unique' => 'Nomor SKU sudah digunakan.'
        ]);

        $product = new Product();

        $product->name = $name;
        $product->sku = $sku;
        $product->description = $description;
        $product->price = $price;
        $product->save();

        return redirect('products')->with('success', 'Berhasil meanmbahkan produk '.$name);
    }

    public function edit($id) {
        $product = Product::find($id);

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id) {
        $name = $request->input('name');
        $sku = $request->input('sku');
        $description = $request->input('description');
        $price = $request->input('price');

        $product = Product::find($id);
        
        $product->name = $name;
        $product->sku = $sku;
        $product->description = $description;
        $product->price = $price;
        $product->save();

        return redirect('products')->with('success', 'Berhasil update data '.$name);
    }

    public function destroy($id) {
        $product = Product::destroy($id);

        return redirect()->back()->with('success', 'Produk terhapus.');
    }

    public function search(Request $request) {
        $search = $request->get('search');
        $products = Product::where('name', 'like', '%'.$search.'%')->paginate(10);

        if(count($products) == 0) {
            return view('products.index', compact('products'))->with('error', 'Pencarian '.$search.' tidak ditemukan.');
        }

        return view('products.index', compact('products'));
    }

}
