<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCartController extends Controller
{

    public function index()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        // Menghitung total_amount untuk checkout
        $totalAmount = 0;
        foreach($carts as $cart){
            $totalAmount += $cart->product->price * $cart->quantity;
        }

        $data = [
            'title' => 'My Cart',
            'notif' => Cart::where('user_id', Auth::user()->id)->get()->count(),
            'carts' => $carts,
            'total_amount' => $totalAmount
        ];

        return view('user.cart', $data);
    }

    public function store(Request $request)
    {
        $product = Product::find($request->product_id);

        Cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'quantity' => $request->product_quantity,
        ]);

        return redirect('/products')->with('info', $request->quantity . ' pieces of ' . $product->name . ' has been successfully put into the cart!');
    }

    public function payment(Request $request)
{
    $product_id = $request->product_id; // Array of product IDs
    $product_quantity = $request->quantity; // Array of quantities

    // Gabungkan data berdasarkan product_id untuk menghindari duplikasi
    $productMap = [];
    for ($i = 0; $i < count($product_id); $i++) {
        $id = $product_id[$i];
        $quantity = $product_quantity[$i];

        if (isset($productMap[$id])) {
            $productMap[$id] += $quantity; // Tambahkan jika produk sudah ada
        } else {
            $productMap[$id] = $quantity;
        }
    }

    // Pastikan produk diambil sesuai urutan `product_id`
    $products = Product::whereIn('id', array_keys($productMap))->get();

    // Atur ulang urutan produk sesuai urutan input
    $orderedProducts = [];
    $orderedQuantities = [];
    foreach (array_keys($productMap) as $id) {
        $orderedProducts[] = $products->firstWhere('id', $id);
        $orderedQuantities[] = $productMap[$id];
    }

    $data = [
        'title' => 'Our Products',
        'products' => $orderedProducts, // Produk dengan urutan benar
        'quantity' => $orderedQuantities, // Kuantitas sesuai urutan produk
        'notif' => Cart::where('user_id', Auth::user()->id)->count(),
        'total_amount' => $request->total_amount
    ];

    return view('user.cart_payment', $data);
}


public function confirmation(Request $request)
{
    // dd($request);
    $user_id = Auth::user()->id;
    $date = strtotime(now());
    $code = 'trx-' . $date . '-' . $user_id;

    // Buat order
    $dataOrder = [
        'user_id' => $user_id,
        'code' => $code,
        'total_amount' => $request->total_amount,
        'status' => 'pending'
    ];
    $order = Order::create($dataOrder);

    // Ambil data produk berdasarkan ID
    $product_id = $request->product_id;
    $products = Product::whereIn('id', $product_id)->get()->keyBy('id'); // Key by ID untuk pencocokan cepat

    foreach ($request->product_id as $key => $id) {
        $quantity = $request->quantity[$key];
        $product = $products[$id];

        // Validasi stok
        if ($product->stock < $quantity) {
            return redirect()->back()->with('error', 'Insufficient stock for product: ' . $product->name);
        }

        // Hitung total amount untuk detail
        $amount = $quantity * $product->price;

        // Simpan detail order
        $dataDetail = [
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price' => $product->price,
            'amount' => $amount,
        ];
        OrderDetail::create($dataDetail);

        // Update stok produk
        $product->decrement('stock', $quantity);
    }

    // Tentukan status pembayaran
    $status = $request->payment_method == 'cod' ? 'unpaid' : 'paid';

    // Simpan data pembayaran
    $dataPayment = [
        'order_id' => $order->id,
        'amount' => $request->total_amount,
        'provider' => $request->provider ?? null,
        'status' => $status,
        'payment_method' => $request->payment_method
    ];
    Payment::create($dataPayment);

    // Kosongkan keranjang
    Cart::where('user_id', $user_id)->delete();

    return redirect('/products')->with('info', 'Thanks for your order!');
}

    public function delete(Cart $cart)
    {
        $cart->delete();
        return redirect('/cart');
    }
}