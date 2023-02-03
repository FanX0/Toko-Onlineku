<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index(Request $request, $id)
    {
        $product = Product::with(['galleries','user'])->where('slug', $id)->firstOrFail();

    return view('pages.detail',[
        'product' => $product
    ]);
    }

    public function add(Request $request, $id)
    {
        $data = [
            'users_id' => Auth::user()->id,
            'products_id' => $id,
        ];

        Cart::create($data);
        
        return redirect()->route('cart');
    }
}
