<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('layout.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('layout.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Product();
        $data->name_product = $request->input('name_product');
        $data->description = $request->input('description');
        $data->stock = $request->input('stock');
        $data->price = $request->input('price');
        $data->category_id = $request->input('category_id');
        if ($data->save()) {
            return redirect()->route('product.index')->with('sukses', 'Produk Berhasil Ditambahkann');
        } else {
            return redirect()->back()->with('sukses', 'Produk Gagal Ditambahkann');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $product = Product::find($id);
        return view('layout.product.edit', compact('category', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Product::find($id);
        $data->name_product = $request->input('name_product');
        $data->description = $request->input('description');
        $data->stock = $request->input('stock');
        $data->price = $request->input('price');
        $data->category_id = $request->input('category_id');
        if ($data->save()) {
            return redirect()->route('product.index')->with('sukses', 'Produk Berhasil Diedit');
        } else {
            return redirect()->back()->with('sukses', 'Produk Gagal Dieditn');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::where('id', $product->id)->delete();
        return redirect('/product')->with('sukses', 'Produk Berhasil Dihapus');
    }
}