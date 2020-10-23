<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('orders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'shipping_fullname' => 'required',
            'shipping_city' => 'required',
            'shipping_address' => 'required',
            'shipping_phone' => 'required',
            'shipping_zipcode' => 'required'
       ]);

       $order = new Order();
       
       $order->order_number = uniqid('OrderNumber-');


       $order->shipping_fullname = $request->input('shipping_fullname');
       $order->shipping_city = $request->input('shipping_city');
       $order->shipping_address = $request->input('shipping_address');
       $order->shipping_phone = $request->input('shipping_phone');
       $order->shipping_zipcode = $request->input('shipping_zipcode');
       
       $order->grand_total = \Cart::session(auth()->id())->getTotal();
       $order->item_count = \Cart::session(auth()->id())->getContent()->count();

       $order->user_id = auth()->id();
       $order->save();

       //save order items
       $cartItems = \Cart::session(auth()->id())->getContent();
        foreach ($cartItems as $item) {
           $order->items()->attach($item->id, ['price' => $item->price, 'quantity'=>$item->quantity]);
        }
       
        //empty cart
        \Cart::session(auth()->id())->clear();

        //send email to custumer

        //take user to thank you page


        return redirect('orders');
    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
