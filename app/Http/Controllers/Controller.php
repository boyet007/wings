<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Product;
use Illuminate\Http\Request;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getProducts() {
        $products = Product::all();        
        return view('products', compact('products'));
    }

    public function getDetailProduct($code) {
        $product = Product::where('product_code', $code)->first();
        return view('product-detail', compact('product'));
    }

    public function checkout() {
        return view('checkout');
    }

    // cart

    public function cartList()
    {
        $carts = json_decode(request()->cookie('wing-carts'), true);
        
        $subtotal = collect($carts)->sum(function($q) {
            return $q['qty'] * $q['product_price'];
        });
        return view('checkout', compact('carts', 'subtotal'));
    }

    public function addToCart(Request $request)
    {
        $product_code = $request->product_code;
        $carts = json_decode($request->cookie('wing-carts'), true); 
        if ($carts && array_key_exists($request->product_code, $carts)) {
            $carts[$request->product_code]['qty'] ++;
        } else {
            $product = Product::where('product_code', $request->product_code)->first();
            $carts[$request->product_code] = [
                'qty' => 1,
                'product_code' => $product->product_code,
                'product_name' => $product->product_name,
                'product_price' => $product->price,
                'product_currency' => $product->currency,
                'product_discount' => $product->discount,
                'product_dimension' => $product->dimension,
                'product_unit' => $product->unit
            ];
        }
        $cookie = cookie('wing-carts', json_encode($carts), 2880);
        return redirect()->back()->cookie($cookie)->with(['success' => 'Product has added to chart!']);
    }

    public function getReports() {}
}
