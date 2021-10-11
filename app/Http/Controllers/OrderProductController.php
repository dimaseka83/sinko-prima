<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\customer;
use App\Models\warehouse;
use App\Models\orderProduct;
use App\Models\purchasing;
use App\Models\stok;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchasings = purchasing::all();
        return view('order.index',compact('purchasings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = customer::all();
        $product = product::all();
        $warehouse = warehouse::all();
        return view('order.create',compact('customer','product','warehouse'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchasings = new purchasing();
        $purchasings->customer_id = $request->customer_id;
        $purchasings->address = $request->address;
        $purchasings->pay_product = $request->pay_product;
        $purchasings->delivery_date = $request->delivery_date;
        $purchasings->delivery_courier = $request->delivery_courier;
        $purchasings->warehouse_id = $request->warehouse_id;
        $purchasings->save();
        $data = count($request->product_id);
        if ($purchasings->save()) {
            for ($i=0; $i < $data; $i++) { 
                orderProduct::updateOrCreate([
                    'purchasing_id'=> $purchasings->id,
                    'product_id'=>$request->product_id[$i],
                ],
                [
                    'jumlah' => $request->jumlah[$i],
                    'status' => $request->status[$i],
                ]
            );
            }
            for ($j=0; $j < $data; $j++) { 
                $stok = stok::where([
                    'warehouse_id' => $request->warehouse_id,
                    'product_id' => $request->product_id[$j],
                ])->first();
                $stok->jumlah -= $request->jumlah[$j];
                $stok->save();
            }
            return redirect(route('order.index'));
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\orderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\orderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = customer::all();
        $product = product::all();
        $purchasings = purchasing::find($id);
        $warehouse = warehouse::all();
        $order = orderProduct::where('purchasing_id',$id)->get();
        return view('order.edit', compact('customer', 'purchasings', 'order', 'product','warehouse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\orderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\orderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
