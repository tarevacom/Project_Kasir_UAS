<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //pasing data product
        $product = Product::all();
        //ambil data order berdasarkan user
        $cart = Order::where('user_id', Auth::user()->id)->where('status', '0')->get();

        return view('layout.order.index', compact('product', 'cart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        //jika product blm dipilih
        // return $r;

        $count = Order::where('status', '0')->where('user_id', auth()->user()->id)->count();
        $data = Order::where('status', '0')->where('user_id', auth()->user()->id)->first();
        if ($count) {
            $validate = [
                'status' => 0,
                'card_id' => $data['card_id'],
                'product_id' => $r->product_id,
                'user_id' => 1
            ];
            $product = Product::where('id', $r->product_id)->first();
            $order = Order::where('status', '0')->where('product_id', $r->product_id)->where('user_id', '1')->first();

            if ($order) {
                $qty = $order['jumlah'];
                $validate['jumlah'] = $qty + $r->jumlah;
                $validate['sub_total'] = $validate['jumlah'] * $product->price;
                // return $validate;
                Order::where('product_id', $r->product_id)->update($validate);
                return back();
            } else {
                $validate['jumlah'] = $r->jumlah;
                $validate['sub_total'] = $product->price * $r->jumlah;

                Order::create($validate);
                return back();
            }
        } else {
            $product = Product::where('id', $r->product_id)->first();

            $validate = [
                'card_id' => 'CW-' . date('Y-m-d') . '-' . Str::random(5),
                'status' => 0,
                'product_id' => $r->product_id,
                'user_id' => 1,
                'jumlah' => $r->jumlah,
                'sub_total' =>  $product->price * $r->jumlah,
            ];
            Order::create($validate);
            return back();
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}