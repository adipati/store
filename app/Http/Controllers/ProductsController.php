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
        $products = Product::paginate(5);

        return view('products.index', compact('products'));
    }

    public function store(Request $request) {
        $name = $request->input('name');
        $sku = $request->input('sku');
        $description = $request->input('description');
        $price = $request->input('price');

        $product = new Product();

        $product->name = $name;
        $product->sku = $sku;
        $product->description = $description;
        $product->price = $price;
        $product->save();

        return redirect()->back()->with('success', 'Berhasil meanmbahkan produk '.$name);
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

        return redirect()->back()->with('success', 'Berhasil update data '.$name);
    }

    public function destroy($id) {
        $product = Product::destroy($id);

        return redirect()->back()->with('success', 'Produk terhapus.');
    }

}
