<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DetailController extends Controller
{
    public function index(Request $request, $id)
    {
        $product = Product::with(['galleries','user'])->where('slug', $id)->firstOrFail();

        $request->session()->put('product', $product);

    return view('pages.detail',[
        'product' => $product
    ]);
    }
}
