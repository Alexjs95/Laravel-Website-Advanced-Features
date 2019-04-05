<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Purchase;

class CheckoutController extends Controller {
    public function charge(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => 99,         // amount £0.99p
                'currency' => 'gbp',
            ));

            $user_id = auth()->user()->id;      // get currently logged in user's ID.

            $purchase = new Purchase;       // create a new purchase
            $purchase->user_id = $user_id;  //sets the user ID;
            $purchase->item = $request->purchaseType;       // item is whatever user has purchased

            $purchase->save();     // store the topic.
            return redirect('/home')->with('success', 'Payment charged');   // return success message
        } catch (\Exception $ex) {
            return redirect('/home')->with('error', 'A problem occured with your payment.');   // return error message
        }
    }
}
