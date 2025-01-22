<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $notif = Cart::where('user_id', Auth::user()->id)->get()->count();
        }else{
            $notif = 0;
        }

        $data = [
            'title' => 'Home',
            'notif' => $notif,
        ];

        return view('home', $data);
    }

    public function about()
    {
        if(Auth::check()){
            $notif = Cart::where('user_id', Auth::user()->id)->get()->count();
        }else{
            $notif = 0;
        }

        $data = [
            'title' => 'About',
            'notif' => $notif,
        ];

        return view('about', $data);
    }

    public function contact()
    {
        if(Auth::check()){
            $notif = Cart::where('user_id', Auth::user()->id)->get()->count();
        }else{
            $notif = 0;
        }

        $data = [
            'title' => 'Contact',
            'notif' => $notif,
        ];

        return view('contact', $data);
    }

    public function products(Request $request)
    {
        $notif = Auth::check() ? Cart::where('user_id', Auth::user()->id)->count() : 0;

        // Filter kategori
        $categoryFilter = $request->get('category');
        $products = Product::where('stock', '>=', 1);

        if ($categoryFilter && $categoryFilter !== 'ALL Product') {
            $products = $products->whereHas('category', function ($query) use ($categoryFilter) {
                $query->where('name', $categoryFilter);
            });
        }

        $data = [
            'title' => $categoryFilter && $categoryFilter !== 'ALL Product' ? ucfirst($categoryFilter) : 'Our Products',
            'products' => $products->get(),
            'notif' => $notif,
            'categories' => ['ALL Product', 'Bandana', 'Keychain', 'Tumbler', 'Socks', 'Belt'], // Tambahkan ALL Product
        ];

        return view('products', $data);
    }


}