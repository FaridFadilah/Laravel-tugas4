<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller{
    public function index(){
        $blog = blog::get();
        if(!$blog){
            return response()->json([
                'status' => false,
                'msg' => 'blog tidak ditemukan',
                'data' => null
            ]);
        }

        return response()->json([
            'status' => true,
            'msg' => 'Success',
            'data' => $blog
        ]);
    }

    public function show($id){
        $blog = blog::where('id', $id)->first();
        if(!$blog){
            return response()->json([
                'status' => false,
                'msg' => 'blog tidak ditemukan',
                'data' => null
            ]);
        }

        return response()->json([
            'status' => true,
            'msg' => 'Success',
            'data' => $blog
        ]);
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            'nama' => ['required'],
            'img' => ['required', 'image'],
            'slug' => ['required'],
            'isi' => ['required']
        ], [
            'required' => ':attribute Tidak boleh kosong'
        ]);

        if($validate->fails()){
            return response()->json([
                'status' => false,
                'code' => 400,
                'message' => $validate->errors()
            ]);
        }

        if($request->hasFile('img')){
            $imgFile = $request->file('img');
            $imgName = time() . '-' . $imgFile->hashName();
            $imgFile->move('img/', $imgName);
        } else{
            $imgName = "default.jpg";
        }

        Blog::create([
            'nama' => $request->nama,
            'img' => $imgName,
            'slug' => $request->slug,
            'isi' => $request->isi,
        ]);
        
        return response()->json([
            'status' => true,
            'message' => 'success',
            'code' => 200,
            'data' => [
                'nama' => $request->nama,
                'img' => $imgName,
                'slug' => $request->slug,
                'isi' => $request->isi
            ]
        ]);
    }
    public function update(Request $request, $id){
        $getData = Blog::where('id', $id)->first();

        if(!$getData) return response()->json([
            'message' => 'Blog tidak ditemukan',
            'status' => false,
            'code' => 404,
        ]);

        $validate = Validator::make($request->all(),[
            'nama' => ['required'],
            'img' => ['required', 'image'],
            'slug' => ['required'],
            'isi' => ['required']
        ], [
            'required' => ':attribute Tidak boleh kosong'
        ]);

        if($validate->fails()){
            return response()->json([
                'status' => false,
                'code' => 400,
                'message' => $validate->errors()
            ]);
        }

        if($request->hasFile('img')){
            $imgFile = $request->file('img');
            $imgName = time() . '-' . $imgFile->hashName();
            $imgFile->move('img/', $imgName);
        } else{
            $imgName = "default.jpg";
        }

        $getData->update([
            'nama' => $request->nama,
            'img' => $imgName,
            'slug' => $request->slug,
            'isi' => $request->isi,
        ]);
        
        return response()->json([
            'status' => true,
            'message' => 'success',
            'code' => 200,
            'data' => [
                'nama' => $request->nama,
                'img' => $imgName,
                'slug' => $request->slug,
                'isi' => $request->isi
            ]
        ]);
    }

    public function delete(){

    }

}
