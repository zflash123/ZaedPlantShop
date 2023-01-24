<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Interfaces\UserRepositoryInterface;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private UserRepositoryInterface $userRepository;

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function __construct(UserRepositoryInterface $userRepository)
    {
        // $this->middleware('auth');
        $this->userRepository = $userRepository;
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $arrImg = ['/img/peperomia.jpg', '/img/samhong.jpg', '/img/humus.jpg'];
        $arrBarang = ['Plant', 'Pot', 'Growing Media'];
        $arrLink = ['/plant', '/pot', '/growing-media'];

        return view('home', ['users' => $this->userRepository->getUser()])->with('Barang', $arrBarang)->with('Gambar', $arrImg)->with('Link', $arrLink);
    }

    public function tanaman()
    {
        $arrImg = ['/img/keladi.jpg', '/img/peperomia.jpg', '/img/jade.jpg'];
        $arrTanaman = ['Keladi Tengkorak', 'Peperomia Watermelon', 'Jade Plant'];

        return view('tanaman', ['users' => $this->userRepository->getUser()])->with('Gambar', $arrImg)->with('Barang', $arrTanaman);
    }

    public function benih()
    {
        $arrImg = ['/img/samhong.jpg', '/img/daisy.jpg', '/img/pakcoy.jpg'];
        $arrBarang = ['Samhong King', 'Painted Daisy', 'Red Pakcoy'];

        return view('benih', ['users' => $this->userRepository->getUser()])->with('Barang', $arrBarang)->with('Gambar', $arrImg);
    }

    public function media()
    {
        $arrImg = ['/img/humus.jpg', '/img/sekam.jpg', '/img/sekamBakar.jpg'];
        $arrBarang = ['Tanah Humus', 'Sekam Mentah', 'Sekam Bakar'];

        return view('media', ['users' => $this->userRepository->getUser()])->with('Barang', $arrBarang)->with('Gambar', $arrImg);
    }

    public function cart()
    {
        $product = [];
        $product[0] = 'Mobil';

        return view('cart', ['users' => $this->userRepository->getUser()], ['product' => $product]);
    }

    public function helpdesk()
    {
        return view('helpdesk', ['users' => $this->userRepository->getUser()]);
    }

    public function confirm(Request $req)
    {
        $validateData = $req->validate([
            'nama' => ['required'],
            'email' => ['required'],
            'jenis_barang' => ['required'],
            'nama_barang' => ['required'],
        ]);
        $query = DB::table('order_product')->insert([
            'nama' => $validateData['nama'],
            'email' => $validateData['email'],
            'jenis_barang' => $validateData['jenis_barang'],
            'nama_barang' => $validateData['nama_barang'],
        ]);
        if ($query == 1) {
            echo "<script>alert('Data Sukses Dimasukkan ke Database')</script>";
            header('refresh:1;url=/');
        }
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
