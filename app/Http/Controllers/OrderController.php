<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Order',
            'orders' => Order::where('status', '!=', 'delivered')->get(),
        ];
        return view('admin.order.index', $data);
    }

    public function show($id)
    {
        $order = Order::with(['details.product', 'user', 'payments'])->findOrFail($id);

        return response()->json($order);
    }

    public function update(Request $request, $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered',
        ]);

        $order = Order::findOrFail($order);
        $order->status = $request->status;
        $order->save();

        return redirect('/order')->with('info', 'Order status updated successfully.');
    }

    public function delete(Order $order): RedirectResponse
    {
        $order->delete();
        return redirect('/order')->with('info', 'Order deleted successfully!');
    }

    public function sales()
    {
        $sales = Order::with('user')
                     ->where('status', 'delivered')
                     ->get();

        $data = [
            'title' => 'Sales',
            'sales' => $sales,
        ];

        return view('admin.sales.index', $data);
    }
}
