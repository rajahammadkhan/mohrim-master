<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;
use Stripe;
use Session;

class PaymentGatewayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentGateway  $paymentGateway
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentGateway $paymentGateway)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentGateway  $paymentGateway
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentGateway $paymentGateway)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentGateway  $paymentGateway
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentGateway $paymentGateway)
    {
        //
    }



    /**
     * Write code on Method
     *
     * @return response()
     */
    static function exampleFunctionStatic(Request $request)
    {
        //dd($request);
        if($request){

                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                    Stripe\Charge::create([
                        "amount" => $request->grand * 100,
                        "currency" => "usd",
                        "source" => $request->stripeToken,
                        "description" => "test payment fot mohrim."
                    ]);

                    Session::flash('success', 'Payment successful!');
                    session::forget('cart');

                    return back();
        }else{
            $provider = new PayPalClient;

// Through facade. No need to import namespaces
            $provider = \PayPal::setProvider();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentGateway  $paymentGateway
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentGateway $paymentGateway)
    {
        //
    }

    public function gameonhai(Request $request)
    {
        //

        $provider = new PayPalClient;

// Through facade. No need to import namespaces
            $provider = \PayPal::setProvider();
            $config = [
                'mode'    => 'sandbox',
                'live' => [
                    'client_id'         => 'AQm5_OLqcGdOkbAaU_CWQMRDdZCOkHVjVU7VlJrRGP_k6lFh4S2A6tK38KKAA6vsvsJm-MG3a2dpPWmj',
                    'client_secret'     => 'EP3lcOtwbH9Ik3qMdcUG4lyeJsdjso5LA7vCc97eOhfpj6_Y8cpqTwGNhSKv1HTmd41aVs7mpBmQk6fq',
                    'app_id'            => 'APP-80W284485P519543T',
                ],

                'payment_action' => 'Order',
                'currency'       => 'USD',
                'notify_url'     => 'https://eliteblue.net/Clients/viys/coupon/public/gameonhai2',
                'locale'         => 'en_US',
                'validate_ssl'   => true,
            ];
            $provider->getAccessToken();
//            print_r($provider->getAccessToken());

           // $provider->setApiCredentials($config);
            //$provider->setRequestHeader("Authorization", );
            $data1 = json_decode('{
                    "intent": "CAPTURE",
                    "purchase_units": [
                      {
                        "amount": {
                          "currency_code": "USD",
                          "value": "100.00"
                        }
                      }
                    ],
                    
                    "application_context": {
                        "return_url": "https://eliteblue.net/Clients/viys/coupon/public/return",
                        "cancel_url": "https://eliteblue.net/Clients/viys/coupon/public/cancel"
                    }
                }', true);
            $order = $provider->createOrder($data1);
            print_r($order);
        die();

        $order_id = $order['id'];
            $authorize = $provider->authorizePaymentOrder($order_id);
            print_r($authorize);
            $capture = $provider->capturePaymentOrder($order_id);
            print_r($capture);
    }
}
