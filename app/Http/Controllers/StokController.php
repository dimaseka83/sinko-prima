<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\stok;
use App\Models\warehouse;
use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stok = stok::all();
        return view('stok.index', compact('stok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = product::all();
        $warehouse = warehouse::all();
        return view('stok.create',compact('product','warehouse'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stok = new stok();
        $stok->product_id = $request->product_id;
        $stok->warehouse_id = $request->warehouse_id;
        $stok->jumlah = $request->jumlah;
        $stok->save();
        return redirect(route('stok.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stok = stok::find($id);
        $product = product::all();
        $warehouse = warehouse::all();
        return view('stok.edit', compact('stok','product','warehouse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stok = stok::find($id);
        $stok->product_id = $request->product_id;
        $stok->warehouse_id = $request->warehouse_id;
        $stok->jumlah = $request->jumlah;
        $stok->save();
        return redirect(route('stok.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
