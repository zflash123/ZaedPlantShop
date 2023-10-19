<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Cart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private UserRepositoryInterface $userRepository;


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
        $arrImg = DB::table('products')->groupBy('product_category_id')->pluck('image_name');
        $arrProduct = ['Plant', 'Growing Media', 'Pot'];
        $arrLink = ['/plant', '/growing-media', '/pot'];

        return view('home', ['users' => $this->userRepository->getUser()])->with('Product', $arrProduct)->with('Image', $arrImg)->with('Link', $arrLink);
    }

    public function plant()
    {
        $arrImg = DB::table('products')->where('product_category_id', 1)->pluck('image_name');
        $arrProduct = DB::table('products')->where('product_category_id', 1)->pluck('name');

        return view('plant', ['users' => $this->userRepository->getUser()])->with('Image', $arrImg)->with('arrProduct', $arrProduct);
    }

    public function media()
    {
        $arrImg = DB::table('products')->where('product_category_id', 2)->pluck('image_name');
        $arrProduct = DB::table('products')->where('product_category_id', 2)->pluck('name');

        return view('media', ['users' => $this->userRepository->getUser()])->with('arrProduct', $arrProduct)->with('Image', $arrImg);
    }

    public function pot()
    {
        $arrImg = DB::table('products')->where('product_category_id', 3)->pluck('image_name');
        $arrProduct = DB::table('products')->where('product_category_id', 3)->pluck('name');

        return view('pot', ['users' => $this->userRepository->getUser()])->with('arrProduct', $arrProduct)->with('Image', $arrImg);
    }

    public function cart()
    {
        $userId = Auth::id();
        $products = DB::table('carts')
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->select('products.name')
            ->where('carts.user_id', $userId)
            ->get();

        return view('cart', ['users' => $this->userRepository->getUser()], ['products' => $products]);
    }

    public function addToCart(Request $req)
    {
        $userId = Auth::id();
        $product_id = DB::table('products')
            ->select('products.id')
            ->where('products.name', $req->product_name)
            ->get();
        Cart::create([
            'user_id' => $userId,
            'product_id' => $product_id[0]->id,
            'total_added' => 1,
        ]);
        return redirect('/cart');
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
