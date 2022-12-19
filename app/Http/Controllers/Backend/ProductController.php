<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller{
    public function index(){
        $getProduct =  Product::all();
        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'Success',
            'data' => $getProduct,
        ]);
    }
    public function show($id){
        $getProduct = Product::where('id', $id)->first();
        if(!$getProduct) return response()->json([
            'status' => false,
            'code' => 404,
            'message' => 'Product not found',
            'data' => null,
        ]);
        return response()->json([
            'message' => 'Success',
            'status' => true,
            'data' => $getProduct,
        ]);
    }
    public function store(Request $request){
        $request->validate([
            'nama' => ['required'],
            'deskripsi' => ['required'],
            'img' => ['required'],
            'harga' => ['required'],
        ]);
        Product::create($request->all());
        return response()->json([
            'message' => 'success',
            'status' => true,
            'code' => 200,
            'data' => $request->all(),
        ]);
    }

    public function update(Request $request){
        $request->validate([
            'nama' => ['required'],
            'deskripsi' => ['required'],
            'img' => ['required'],
            'harga' => ['required'],
        ]);
        Product::create($request->all());
        return response()->json([
            'message' => 'success',
            'status' => true,
            'code' => 200,
            'data' => $request->all(),
        ]);
    }

    public function delete($id){
        Product::where('id', $id)->delete();
        return response()->json([
            'message' => 'success',
            'status' => true,
            'code' => 200
        ]);
    }
}
