<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Redirect;
// use Illuminate\Support\Facades\Validator;

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
        $userId = Auth::id();
        $result = DB::table('users')->where('id', $userId)->get();
        $arrImg = ["/img/peperomia.jpg", "/img/samhong.jpg", "/img/humus.jpg"];
        $arrBarang = ["Tanaman", "Benih", "Media Tanam"];
        $arrLink = ["/tanaman", "/benih", "/media"];
        return view('home', ['users' => $result])->with('Barang', $arrBarang)->with('Gambar', $arrImg)->with('Link', $arrLink);
    }
    
    public function tanaman()
    {
        $userId = Auth::id();
        $result = DB::table('users')->where('id', $userId)->get();
        $arrImg = ["/img/keladi.jpg", "/img/peperomia.jpg", "/img/jade.jpg"];
        $arrTanaman = ["Keladi Tengkorak", "Peperomia Watermelon", "Jade Plant"];
        return view('tanaman', ['users' => $result])->with('Gambar', $arrImg)->with('Tanaman', $arrTanaman);
    }
    public function benih()
    {
        $userId = Auth::id();
        $result = DB::table('users')->where('id', $userId)->get();
        $arrImg = ["/img/samhong.jpg", "/img/daisy.jpg", "/img/pakcoy.jpg"];
        $arrBarang = ["Samhong King", "Painted Daisy", "Red Pakcoy"];
        return view('benih', ['users' => $result])->with('Barang', $arrBarang)->with('Gambar', $arrImg);
    }
    public function media()
    {
        $userId = Auth::id();
        $result = DB::table('users')->where('id', $userId)->get();
        $arrImg = ["/img/humus.jpg", "/img/sekam.jpg", "/img/sekamBakar.jpg"];
        $arrBarang = ["Tanah Humus", "Sekam Mentah", "Sekam Bakar"];
        return view('media', ['users' => $result])->with('Barang', $arrBarang)->with('Gambar', $arrImg);
    }

    public function order()
    {
        $userId = Auth::id();
        $result = DB::table('users')->where('id', $userId)->get();
        return view('order', ['users' => $result]);
    }
    
    public function confirm(Request $req)
    {
        $validateData = $req->validate([
            'nama' => ["required"],
            'email' => ["required"],
            'jenis_barang' => ["required"],
            'nama_barang' => ["required"]
        ]);
        $query = DB::table('order_product')->insert([
            'nama' => $validateData['nama'],
            'email' => $validateData['email'],
            'jenis_barang'=> $validateData['jenis_barang'],
            'nama_barang' => $validateData['nama_barang']
        ]);
        if ($query==1) {
            echo "<script>alert('Data Sukses Dimasukkan ke Database')</script>";
            header( "refresh:1;url=/" );
        };
    }

    
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }

    public function home()
    {
        return redirect('/');
    }
}
