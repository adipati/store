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
        $distributors = Distributor::paginate(15);

        return view('distributors.index', compact('distributors'));
    }

    public function create() {
        return view('distributors.create');
    }

    public function edit($id) {
        $distributor = Distributor::find($id);
        
        return view('distributors.edit', compact('distributor'));
    }

    public function store(Request $request) {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $city = $request->input('city');
        $status = $request->input('status');

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'city' => 'required',
        ],[
            'name.required' => 'Nama Distributor belum diisi',
            'email.required' => 'Alamat Email belum diisi',
            'email.email' => 'Alamat Email tidak valid',
            'phone.required' => 'Nomor Telepon belum diisi',
            'city.required' => 'Kota belum diisi',
        ]);

        $distributor = new Distributor();

        $distributor->name = $name;
        $distributor->email = $email;
        $distributor->phone = $phone;
        $distributor->city = $city;
        $distributor->status = $status;
        $distributor->save();

        return redirect('distributors')->with('success', 'Data Distributor berhasil ditambahkan.');
    }

    public function update(Request $request, $id) {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $city = $request->input('city');
        $status = $request->input('status');

        $distributor = Distributor::find($id);
        
        $distributor->name = $name;
        $distributor->email = $email;
        $distributor->phone = $phone;
        $distributor->city = $city;
        $distributor->status = $status;
        $distributor->save();

        return redirect('distributors')->with('success', 'Data Distributor berhasil diperbarui.');
    }

    public function destroy($id) {
        $distributor = Distributor::destroy($id);

        return redirect()->back()->with('success', 'Data Distributor berhasil dihapus.');
    }

    public function search(Request $request) {
        $search = $request->get('search');
        $distributors = Distributor::where('name', 'like', '%'.$search.'%')->paginate(15);

        if(count($distributors) == 0) {
            return view('distributors.index', compact('distributors'))->with('error', 'Pencarian '.$search.' tidak ditemukan.');
        }

        return view('distributors.index', compact('distributors'));
    }

}
