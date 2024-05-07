<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */
return [
    'mode'    => env('PAYPAL_MODE', 'sandbox'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'username'    => env('PAYPAL_SANDBOX_API_USERNAME', 'yasirshahpk8@gmail.com'),
        'password'    => env('PAYPAL_SANDBOX_API_PASSWORD', 'paypalpass123'),
        'client_secret'      => env('PAYPAL_SANDBOX_API_SECRET', 'EP3lcOtwbH9Ik3qMdcUG4lyeJsdjso5LA7vCc97eOhfpj6_Y8cpqTwGNhSKv1HTmd41aVs7mpBmQk6fq'),
        'client_id' => env('PAYPAL_SANDBOX_API_CERTIFICATE', 'AQm5_OLqcGdOkbAaU_CWQMRDdZCOkHVjVU7VlJrRGP_k6lFh4S2A6tK38KKAA6vsvsJm-MG3a2dpPWmj'),
        'app_id'      => 'Platform Partner App - 4835473245055702808', // Used for testing Adaptive Payments API in sandbox mode
    ],
    'live' => [
        'username'    => env('PAYPAL_LIVE_API_USERNAME', ''),
        'password'    => env('PAYPAL_LIVE_API_PASSWORD', ''),
        'secret'      => env('PAYPAL_LIVE_API_SECRET', ''),
        'certificate' => env('PAYPAL_LIVE_API_CERTIFICATE', ''),
        'app_id'      => '', // Used for Adaptive Payments API
    ],
    'payment_action' => 'Sale', // Can only be 'Sale', 'Authorization' or 'Order'
    'currency'       => env('PAYPAL_CURRENCY', 'USD'),
    'billing_type'   => 'MerchantInitiatedBilling',
    'notify_url'     => 'https://eliteblue.net/Clients/viys/coupon/public/gameonhai2', // Change this accordingly for your application.
    'locale'         => 'en_US', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
    'validate_ssl'   => true, // Validate SSL when creating api client.
];