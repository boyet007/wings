<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Product;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function login() {
        return view('login');
    }

    public function postLogin() {}

    public function getProducts() {
        $products = Product::all();        
        return view('products', compact('products'));
    }

    public function checkout() {
        return view('checkout');
    }

    public function getReports() {}
}
