<?php

namespace App\Http\Controllers\Frontend;

use App\Models\PaymentGateway;
use Illuminate\Http\Request;

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

    public function exampleFunction()
    {
        return "From Another Controller Text";
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

                'payment_action' => 'Sale',
                'currency'       => 'USD',
                'notify_url'     => 'https://eliteblue.net/Clients/viys/coupon/public/gameonhai2',
                'locale'         => 'en_US',
                'validate_ssl'   => true,
            ];

           // $provider->setApiCredentials($config);
            print_r($provider->getAccessToken());
            $data = json_decode('{
                    "intent": "CAPTURE",
                    "purchase_units": [
                      {
                        "amount": {
                          "currency_code": "USD",
                          "value": "100.00"
                        }
                      }
                    ]
                }', true);

            $order = $provider->createOrder($data);
            dd($order);

    }

}
