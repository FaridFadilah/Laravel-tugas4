<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\Product;

class HomePageController extends Controller{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(){
        $product = Product::paginate(3);
        $blog = blog::paginate(3);
        // dd($product);
        return view('page.index', compact('product', 'blog'));
    }
}