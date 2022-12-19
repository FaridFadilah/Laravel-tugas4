<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;

class BlogController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data = Blog::all();
        return view('page.product.index', compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('page.blog.store');
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
            "slug" => ["required"],
            "img" => ['required', 'image', 'mimes:png,jpg'],
            "isi" => ["required"]
        ]);

        if($request->hasFile('img')){
            $imgFile = $request->file('img');
            $imgName = time() . '-' . $imgFile->hashName();
            $imgFile->move('img/', $imgName);
        } else{
            $imgName = "default.jpg";
        }

        Blog::create([
            "nama" => $request->nama,
            "isi" => $request->isi,
            'img' => $imgName,
            'slug' => $request->slug 
        ]);
        return redirect()->route('home')->with('message', "berhasil ditambahkan");
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = Blog::find($id);
        return view('page.blog.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data = Blog::find($id);
        return view('page.blog.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){
        $imgold = Blog::find($id)->first()->img; 
        // dd($imgold);
        $request->validate([
            "nama" => ["required"],
            "slug" => ["required"],
            "img" => ['required', 'image', 'mimes:png,jpg'],
            "isi" => ["required"]
        ]);
        
        unlink(public_path('img/' . $imgold));
        if($request->hasFile('img')){
            $imgFile = $request->file('img');
            $imgName = time() . '-' . $imgFile->hashName();
            $imgFile->move('img/', $imgName);
        } else{
            $imgName = "default.jpg";
        }

        Blog::find($id)->update([
            "nama" => $request->nama,
            "isi" => $request->isi,
            'img' => $imgName,
            'slug' => $request->slug 
        ]);
        return redirect()->route('home')->with('message', "berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $imgold = Blog::find($id)->first()->img; 
        unlink(public_path('img/' . $imgold));
        Blog::find($id)->delete();
        return redirect()->route('home')->with('message', 'Berhasil dihapus');
    }
}
