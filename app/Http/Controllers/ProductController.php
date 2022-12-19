<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data = Product::all();
        return view('page.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('page.product.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            "nama" => ["required"],
            "harga" => ["required", "integer"],
            "img" => ['required', 'image', 'mimes:png,jpg'],
            "deskripsi" => ["required"]
        ]);

        if($request->hasFile('img')){
            $imgFile = $request->file('img');
            $imgName = time() . '-' . $imgFile->hashName();
            $imgFile->move('img/', $imgName);
        } else{
            $imgName = "default.jpg";
        }

        Product::create([
            "nama" => $request->nama,
            "deskripsi" => $request->deskripsi,
            'img' => $imgName,
            'harga' => $request->harga 
        ]);
        return redirect()->route('home')->with('message', "berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = Product::find($id)->first();
        // dd($data);
        return view('page.product.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data = Product::find($id);
        if($data === null) return redirect()->route('home');
        return view('page.product.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $imgold = Product::find($id)->first()->img; 
        // dd($imgold);
        $request->validate([
            "nama" => ["required"],
            "harga" => ["required", "integer"],
            "img" => ['required', 'image', 'mimes:png,jpg'],
            "deskripsi" => ["required"]
        ]);

        unlink(public_path('img/' . $imgold));
        if($request->hasFile('img')){
            $imgFile = $request->file('img');
            $imgName = time() . '-' . $imgFile->hashName();
            $imgFile->move('img/', $imgName);
        } else{
            $imgName = "default.jpg";
        }

        Product::find($id)->update([
            "nama" => $request->nama,
            "deskripsi" => $request->deskripsi,
            'img' => $imgName,
            'harga' => $request->harga 
        ]);
        return redirect()->route('home')->with('message', "berhasil ditambahkan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $imgold = Product::find($id)->first()->img; 
        unlink(public_path('img/' . $imgold));
        Product::find($id)->delete();
        return redirect()->route('home')->with('message', 'Berhasil dihapus');
    }
}