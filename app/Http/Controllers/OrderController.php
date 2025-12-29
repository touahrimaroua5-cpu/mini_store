<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with('client')->get();
        return view('orders.index', compact('orders'));
    }

    public function create(){
        $clients = Client::all();
        $products = Product::where('quantity','>',0)->get(); // only available products
        return view('orders.create', compact('clients','products'));
    }

    public function store(Request $request){
        $request->validate([
            'client_id'=>'required|exists:clients,id',
            'products'=>'required|array'
        ]);

        $order = Order::create([
            'client_id'=>$request->client_id
        ]);

        foreach($request->products as $product_id => $qty){
            $product = Product::find($product_id);
            if($product->quantity < $qty){
                return back()->withErrors("Product {$product->name} stock insufficient");
            }

            // create order item
            OrderItem::create([
                'order_id'=>$order->id,
                'product_id'=>$product_id,
                'quantity'=>$qty,
                'price'=>$product->price
            ]);

            // decrease stock
            $product->update([
                'quantity' => $product->quantity - $qty
            ]);
        }

        return redirect()->route('orders.index');
    }

    public function show(Order $order){
        $order->load('items.product','client');
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order){
        $order->load('items.product');
        $clients = Client::all();
        $products = Product::where('quantity','>',0)->get();
        return view('orders.edit', compact('order','clients','products'));
    }

    public function update(Request $request, Order $order){
        // optional, advanced: handle updating order and stock
    }

    public function destroy(Order $order){
        // return stock to products
        foreach($order->items as $item){
            $item->product->update(['quantity'=>$item->product->quantity+$item->quantity]);
        }
        $order->delete();
        return redirect()->route('orders.index');
    }
}
