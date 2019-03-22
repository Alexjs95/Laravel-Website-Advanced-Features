<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

use App\Purchase;

class CheckoutController extends Controller
{


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
                'amount' => 99,
                'currency' => 'usd',
            ));

            $user_id = auth()->user()->id;



            $purchase = new Purchase;
            $purchase->user_id = $user_id;  //sets the user ID;
            $purchase->item = $request->purchaseType;

            $purchase->save();     // store the topic.
            return redirect('/home')->with('success', 'Payment charged');   // return success message
        } catch (\Exception $ex) {
            return redirect('/home')->with('error', 'A problem occured with your payment.'.$ex->getMessage());   // return error message
        }
    }
}
