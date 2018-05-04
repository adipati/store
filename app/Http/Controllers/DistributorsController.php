<?php

namespace App\Http\Controllers;

use App\Distributor;
use Illuminate\Http\Request;

class DistributorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $distributors = Distributor::paginate(5);

        return view('distributors.index', compact('distributors'));
    }

    public function create() {
        return view('distributors.create');
    }

    public function store(Request $request) {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $city = $request->input('city');

        $distributor = new Distributor();

        $distributor->name = $name;
        $distributor->email = $email;
        $distributor->phone = $phone;
        $distributor->city = $city;
        $distributor->save();

        return redirect('distributors')->with('success', 'Data Distributor berhasil ditambahkan.');
    }

    public function update(Request $request, $id) {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $city = $request->input('city');

        $distributor = Distributor::find($id);
        
        $distributor->name = $name;
        $distributor->email = $email;
        $distributor->phone = $phone;
        $distributor->city = $city;
        $distributor->save();

        return redirect('distributors')->with('success', 'Data Distributor berhasil diperbarui.');
    }

    public function destroy($id) {
        $distributor = Distributor::destroy($id);

        return redirect()->back()->with('success', 'Data Distributor berhasil dihapus.');
    }

    public function search(Request $request) {
        $search = $request->input('search');
        $distributors = Distributor::where('name', 'like', '%'.$search.'%')->paginate(10);

        if(count($distributors) == 0) {
            return view('distributors.index', compact('distributors'))->with('error', 'Pencarian '.$search.' tidak ditemukan.');
        }

        return view('distributors.index', compact('distributors'));
    }

}
