<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Product;
use App\Models\TransactionHeader;
use App\Models\TransactionDetail;
use Carbon\Carbon;

use Illuminate\Http\Request;
use DB;
use Auth;
use Cookie;

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

    public function processCheckout() {
        DB::beginTransaction();
        $user = Auth::user();
        try {
            $carts = $this->getCarts();
            $total = collect($carts)->sum(function($q) {
                return $q['qty'] * $q['product_price'];
            });
            $trxNumber = str_pad((TransactionHeader::count()) + 1, 3, '0', STR_PAD_LEFT); 
            $transactionHeader =  TransactionHeader::create([
                'document_code' => 'TRX',
                'document_number' => $trxNumber,
                'username' => $user->username,
                'total' => $total,
                'date' => date('Y-m-d')
            ]);

            foreach($carts as $row) {
                TransactionDetail::create([
                        'document_code' => 'TRX',
                        'document_number' => $trxNumber,
                        'product_code' => $row['product_code'],
                        'price' => $row['product_price'],
                        'qty' => $row['qty'],
                        'unit' => $row['product_unit'],
                        'sub_total' => $row['qty'] * $row['product_price'],
                        'currency' => $row['product_currency']
                ]);
            }
            DB::commit();
            $carts = [];
            $cookie = Cookie::forget('wing-carts');
            return redirect()->route('products.index')
                ->with(['success' => 'Transaction has been procesed'])
                ->withCookie($cookie);
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }

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

    private function getCarts()
    {
        $carts = json_decode(request()->cookie('wing-carts'), true);
        $carts = $carts != '' ? $carts:[];
        return $carts;
    }

    public function getReports() {
        $transactions = TransactionHeader::all();

        foreach($transactions as $transaction) {
            $utc = new Carbon($transaction->date);
            $transactionDate = $utc->timezone(env('TIMEZONE'))->format('d M y');   
            $transaction->date = $transactionDate;
            $transaction->total = "Rp " . number_format($transaction->total,2,',','.');

            $details = TransactionDetail::where('document_code', $transaction->document_code)
                ->where('document_number', $transaction->document_number)->get();

            foreach($details as $detail) {
                $productName = Product::where('product_code', $detail->product_code)->first()->product_name;
                $detail->product_name = $productName;
            }

            $transaction->details = $details;
        }

        return view('report')->with(compact('transactions'));
    }
}
