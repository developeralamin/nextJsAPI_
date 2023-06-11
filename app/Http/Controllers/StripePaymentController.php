<?php

namespace App\Http\Controllers;

use Stripe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class StripePaymentController extends Controller
{
    /**
     * Show stirpe page
     */
    public function index()
    {
        return view('stripe');
    }
    /**
     * Show stirpe page
     */
    public function stripePost(Request $request)
    {
        // return $request->all();
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $data = Stripe\Charge::create([
            "amount" => 100 * 100,
            "currency" => "INR",
            "source" => $request->stripeToken,
            "description" => "This payment is testing purpose of artofcse",
        ]);
        // dd($data);
        Session::flash('success', 'Payment Successfull!');

        return back();
    }
}
