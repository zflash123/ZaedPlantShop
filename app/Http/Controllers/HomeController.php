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
        $this->middleware('auth');
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
        $arrProduct = ['Plant', 'Pot', 'Growing Media'];
        $arrLink = ['/plant', '/pot', '/growing-media'];

        return view('home', ['users' => $this->userRepository->getUser()])->with('Product', $arrProduct)->with('Image', $arrImg)->with('Link', $arrLink);
    }

    public function plant()
    {
        $arrImg = ['/img/keladi.jpg', '/img/peperomia.jpg', '/img/jade.jpg'];
        $arrProduct = DB::table('products')->where('product_category_id', 1)->pluck('name');

        return view('plant', ['users' => $this->userRepository->getUser()])->with('Image', $arrImg)->with('arrProduct', $arrProduct);
    }

    public function pot()
    {
        $arrImg = ['/img/mini-bowl-ceramic-pot.jpg', '/img/hexagon-ceramic-pot.jpg', '/img/ceramic-pot-d9.jpg'];
        $arrProduct = DB::table('products')->where('product_category_id', 3)->pluck('name');

        return view('pot', ['users' => $this->userRepository->getUser()])->with('arrProduct', $arrProduct)->with('Image', $arrImg);
    }

    public function media()
    {
        $arrImg = ['/img/humus.jpg', '/img/sekam.jpg', '/img/sekamBakar.jpg'];
        $arrProduct = DB::table('products')->where('product_category_id', 2)->pluck('name');

        return view('media', ['users' => $this->userRepository->getUser()])->with('arrProduct', $arrProduct)->with('Image', $arrImg);
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
            'jenis_Product' => ['required'],
            'nama_Product' => ['required'],
        ]);
        $query = DB::table('order_product')->insert([
            'nama' => $validateData['nama'],
            'email' => $validateData['email'],
            'jenis_Product' => $validateData['jenis_Product'],
            'nama_Product' => $validateData['nama_Product'],
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
