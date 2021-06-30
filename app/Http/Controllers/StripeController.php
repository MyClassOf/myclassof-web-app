<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function CreateAccount(Request $request)
    {
        if($request->tos == "on"){
            \Stripe\Stripe::setApiKey('sk_test_51HMagKF0gpNxTBlRHPwpOOhdbnftyAVghyvXGs7xcEfdvyoY93KSz5roRPvq4u6CGzwkbc1S1dME87L4u5221nXE00HAoHEAeI');

            $account = \Stripe\Account::create([
                'country' => 'US',
                'type' => 'custom',
                'capabilities' => [
                    'card_payments' => ['requested' => true],
                    'transfers' => ['requested' => true],
                ],
                'business_type' => 'individual',
                'individual' => [
                    'address' => [
                        'city' => $request->city,
                        'country' => 'US',
                        'line1' => $request->billing_address,
                        'line2' => null,
                        'postal_code' => $request->postal_code,
                        'state' => $request->state,
                    ],
                    'dob' => [
                        'day' => $request->day,
                        'month' => $request->month,
                        'year' => $request->year
                    ],
                    'phone' => $request->phone,
                    'email' => Auth::user()->email,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    // 'id_number' => $request->ssn,
                    'ssn_last_4' => $request->ssn
                ],
                'business_profile' => [
                    'mcc' => '7299', //this is the merchant code for Miscellaneous General Services in Stripe
                    'product_description' => 'Receiving gift funds for graduation.',
                    'url' => 'https://www.myclassof.com/'
                ],
                'tos_acceptance' => [
                    'date' => time(),
                    'ip' => getenv("REMOTE_ADDR")
                ]
            ]);
            
            $stripe = new \Stripe\StripeClient('sk_test_51HMagKF0gpNxTBlRHPwpOOhdbnftyAVghyvXGs7xcEfdvyoY93KSz5roRPvq4u6CGzwkbc1S1dME87L4u5221nXE00HAoHEAeI');
            
            // set up a bank account linked to the user
            $stripe->accounts->createExternalAccount(
              $account->id,
              [
                'external_account' => [
                    'object' => 'bank_account',
                    'country' => 'US',
                    'currency' => 'usd',
                    'account_holder_name' => "{$request->first_name} {$request->last_name}",
                    'account_holder_type' => 'individual',
                    'routing_number' => $request->rout_num,
                    'account_number' => $request->acc_num
                ],
              ]
            );
            
            // saving the stripe account id to the database
            User::where('id', Auth::user()->id)->update([
                'stripe_account' => $account->id
            ]);
            
            return view('stripe.accountConfirm');
        }
        
        else{
            return view('stripe.accountError');
        }
    }
    
    public function CreateCheckoutSession(Request $request, $id)
    {
        $user_info = User::where('id', $id)->get();
        $all_data = $request->all();
        \Stripe\Stripe::setApiKey('sk_test_51HMagKF0gpNxTBlRHPwpOOhdbnftyAVghyvXGs7xcEfdvyoY93KSz5roRPvq4u6CGzwkbc1S1dME87L4u5221nXE00HAoHEAeI');

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
            'name' => 'Graduate Gift',
            'amount' => $request->total_price,
            'currency' => 'usd',
            'quantity' => 1,
        ]],
            'payment_intent_data' => [
            'application_fee_amount' => $request->mco_fee,
        ],
            'success_url' => 'https://dev.myclassof.com/gradgift/'.$id,
            'cancel_url' => 'https://dev.myclassof.com/gradgift/'.$id,
        ], ['stripe_account' => $user_info[0]->stripe_account]);
        
        // echo $session;
        return redirect()->route('checkout', ['id' => $session->id]);
        // return $response->withJson(array('sessionId' => $session['id']));
    }
    
    public function GetCheckoutSession()
    {
        \Stripe\Stripe::setApiKey('sk_test_51HMagKF0gpNxTBlRHPwpOOhdbnftyAVghyvXGs7xcEfdvyoY93KSz5roRPvq4u6CGzwkbc1S1dME87L4u5221nXE00HAoHEAeI');
        // $data['id'] = $id;
        // return $stripe->checkout->sessions->retrieve($id,[]);
        return \Stripe\Checkout\Session::all();
    }
    
    public function Checkout($id) 
    {
        $data['id'] = $id;
        // $stripe = new \Stripe\StripeClient('sk_test_51HMagKF0gpNxTBlRHPwpOOhdbnftyAVghyvXGs7xcEfdvyoY93KSz5roRPvq4u6CGzwkbc1S1dME87L4u5221nXE00HAoHEAeI');
        \Stripe\Stripe::setApiKey('sk_test_51HMagKF0gpNxTBlRHPwpOOhdbnftyAVghyvXGs7xcEfdvyoY93KSz5roRPvq4u6CGzwkbc1S1dME87L4u5221nXE00HAoHEAeI');
        // $stripe->checkout->sessions->retrieve($id,[]);
        $checkout_session = \Stripe\Checkout\Session::all();
        $data['checkout_session'] = $checkout_session;
        return view('stripe.checkout', $data);
    }
}