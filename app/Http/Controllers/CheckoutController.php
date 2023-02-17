<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Cart;

use Exception;

use Midtrans\Config;
use Midtrans\Snap;




class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        // Save user data
        $user = Auth::user();
        $user->update($request->except('total_price'));

        // Proccess checkout
        $code = 'STORE-' . mt_rand(00000, 99999);
        $carts = Cart::with(['product','user'])
            ->where('users_id', Auth::user()->id)
            ->get();

        // Transaction create
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'inscurance_price' => 0,
            'shipping_price' => 0,
            'total_price' => $request->total_price,
            'transaction_status' => 'PENDING',
            'code' => $code
        ]);

        foreach ($carts as $cart) {
            $trx = 'TRX-' . mt_rand(0000,9999);

            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'price' => $cart->product->price,
                'shipping_status' => 'PENDING',
                'resi' => '',
                'code' => $trx
            ]);
        }

        // Delete cart data
        Cart::where('users_id', Auth::user()->id)->delete();


        // konfigurasi midtrans
       // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
         // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

            //Array ke Midtrans
            $midtrans = array(
                'transaction_details' => array(
                    'order_id' =>  $code,
                    'gross_amount' => (int) $request->total_price,
                ),
                'customer_details' => array(
                    'first_name'    => 'Galih Pratama',
                    'email'         => 'hanamura.iost@gmail.com'
                ),
                'enabled_payments' => array('gopay','bank_transfer'),
                'vtweb' => array()
        );

            //Mengambil halaman payment midtrans
            try {
              // Get Snap Payment Page URL
              $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

              // Redirect to Snap Payment Page
              return redirect($paymentUrl);
            }
            catch (Exception $e) {
              echo $e->getMessage();
            }
    }
    
}
