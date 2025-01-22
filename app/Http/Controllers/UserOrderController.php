<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    public function index(Request $request)
    {
        $quantity = $request->product_quantity;
        $product = Product::find($request->product_id);
        $total_amount = $quantity * $product->price;
        $data = [
            'title' => 'Our Products',
            'product' => $product,
            'amount' => $total_amount,
            'notif' => Cart::where('user_id', Auth::user()->id)->get()->count(),
            'quantity' => $quantity
        ];

        return view('user.payment', $data);
    }

    public function confirmation(Request $request)
    {
        $user_id = Auth::user()->id;
        $date = strtotime(now());
        $code = 'trx-' . $date . '-' . $user_id;

        $dataOrder = [
            'user_id' => $user_id,
            'code' => $code,
            'total_amount' => $request->total_amount,
            'status' => 'pending'
        ];

        $order = Order::create($dataOrder);

        $product = Product::find($request->product_id);
        $amount = $request->quantity * $product->price;
        $dataDetail = [
            'order_id' => $order->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'price' => $product->price,
            'amount' => $amount,
        ];

        $stock = $product->stock - $request->quantity;
        $product->update(['stock' => $stock]);

        OrderDetail::create($dataDetail);

        if($request->payment_method == 'cod'){
            $status = 'unpaid';
        } else {
            $status = 'paid';
        }

        $dataPayment = [
            'order_id' => $order->id,
            'amount' => $request->total_amount,
            'provider' => $request->provider,
            'status' => $status,
            'payment_method' => $request->payment_method
        ];

        Payment::create($dataPayment);

        return redirect('/products')->with('info', 'Thanks for your order!');
    }


public function orderStatus()
{
    $orders = Order::with('details.product') // Pastikan relasi product diload
                   ->where('user_id', Auth::id())
                   ->get();

    return view('user.orderstatus', [
        'orders' => $orders,
        'title' => 'Status',
    ]);
}



}