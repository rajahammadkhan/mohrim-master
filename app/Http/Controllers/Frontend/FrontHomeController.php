<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Settings;
use App\Helpers\ecommerce;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\categories;
use App\Models\country;
use App\Models\Currency;
use App\Models\orderDetails;
use App\Models\RelatedProduct;
use App\Models\seo;
use App\Models\Pages;
use App\Models\Newsletter;
use App\Models\shipmentDetails;
use App\Models\Gallery;
use DB;
use PhpOffice\PhpSpreadsheet\Calculation\Financial\Coupons;
use Session;
use App\Models\coupon;
use App\Models\ProductVariant;
use App\Models\ProductInCategory;
use App\Models\Keyword;
use App\Models\Reaction;
use App\Models\media;
use App\Models\Contact;
use App\Models\Products;
use App\Models\ProductReviews;
use App\Models\Product;
use App\Models\productpivot;
use App\Models\SizeChart;
use App\Models\CouponDiscount;
use App\Models\User;
use App\Models\ShippingMethods;
use App\Models\Variation;
use App\Http\Controllers\Frontend\PaymentGatewayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Stripe;





class FrontHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data['product'] =DB::table('products')
            ->leftJoin('media', function($join)
            {
                $join->on('media.reference_id', '=', 'products.id')
                    ->where('reference_type', 'product');
//                     $join->on('media.reference_type' ,'=' ,'products.xyz');

            })
            ->leftJoin('seos', function($jo)
            {
                $jo->on('seos.reference_id', '=', 'products.id')
                    ->where('seos.reference_type', 'product');

            })
            ->leftJoin('product_variants', function($jo)
            {
                $jo->on('product_variants.product_id', '=', 'products.id');

            })
//            ->select('products.*', 'media.*','product_variants.*','seos.*')
            ->select('products.*', 'media.*','seos.*')->groupby('media.reference_id')
            ->get(); // or first()

        return view('frontend.home.index');
    }
    public function countrysort($id)
    {
        if(Session::get('country') == null){
            Session::put('country', $id);
        }else{
            Session::forget('country');
            Session::put('country', $id);

        }


        return redirect()->back();
    }
    public function currencysort($id)
    {
        if(Session::get('currency') == null){
            Session::put('currency', $id);
        }
        else{
            Session::forget('currency');
            Session::put('currency', $id);
        }
        return redirect()->back();
    }
    public function SearchResult(Request $request)
    {
        $coupon =array();
        if($request->category != null && $request->coupon != null) {
            $coupons = coupon::where('status',1)->where('category_id', base64_decode($request->category))
                ->where('title', 'like', "%$request->coupon%")
                ->get();
        }elseif($request->category  != null && $request->coupon == null){
            $coupons = coupon::where('status',1)->where('category_id', base64_decode($request->category))

                ->get();
        }elseif($request->category  == null && $request->coupon != null){
            $coupons = coupon::where('status',1)->where('title', 'like', "%$request->coupon%")
                ->get();
        }

        foreach ($coupons as $row) {
            $seo = seo::where(['reference_type' => 'coupon', 'reference_id' => $row->id])->get()->first();
            $reaction = Reaction::where(['type' => 'comment', 'reference_type' => 'coupon', 'reference_id' => $row->id])->get();
            $media = media::where(['reference_type' => 'coupon', 'reference_id' => $row->id])->get();
            $country = country::where(['id' => $row->country_id])->get()->first();
            $category = categories::where('id',$row->category_id)->first();

            $coupon[] = [
                'basic' => $row,
                'media' => $media,
                'seo' => $seo,
                'country' => $country,
                'comment' => count($reaction),
                'category' => $category,
            ];
        }
        $column = '2half';
        return   view('frontend/search/index',compact('coupon','column'));

    }


    public function ContactPost(Request $request)
    {
        Contact::create($request->all());
        return redirect()->back()->with('success','Your Query Has been submitted');
    }
    public function newsletter(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        $check =  Newsletter::where('email',$request->email)->get();
        if(count($check) == 0 ) {
            if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
            {

                return 'false';
            } else {
                Newsletter::create($request->all());
//            return redirect()->back()->with('success','Your Query Has been submitted');
                return true;
            }
        }else{
            return 2;
        }

//        Contact::create($request->all());
//        return redirect()->back()->with('success','Your Query Has been submitted');
    }

    public function PageShow($slug)
    {
        $data['blog'] = Pages::where('slug',$slug)->get()->first();
        if($data['blog']!=null)
        {
            $data['blog'] = Pages::where('slug',$slug)->get()->first();
            $data['media'] =media::where('reference_id', $data['blog']->id)->where('reference_type','page')->get()->first();
            return view('frontend/pages/show',$data);
        }
        else
        {
            return view('404');
        }
    }

    public function SearchKeyword(Request $request)
    {

        if ($request->keyword != null) {
            $coupons = Keyword::where('title', 'like', "%$request->keyword%")
                ->get();
            return response($coupons);

        }
    }

    public function singleProduct($slug)
    {
        $data['product'] = Product::where('slug',$slug)->get()->first();
        $data['reviews'] = ProductReviews::where('status',1)

            ->where('product_id',$data['product']->id)->latest()->paginate(5);
        if($data['product']->is_variant == 1){
            $data['pivot'] =  ProductVariant::where('product_id',$data['product']->id)->where('currency_id',Settings::SelectedCurrency()->id)->get()->first();
            $data['variation'] = ProductVariant::where('product_id',$data['product']->id)->get();
            $var = ProductVariant::where('product_id',$data['product']->id)->get();

                $variant_array = array();
                $json_var = [];
                foreach($var as $v) {
                    $json_var[]= json_decode($v->variant_options,true);
                    $v = json_decode($v->variant_options,true);
                    foreach($v as $d){
                        foreach($d as $key => $e){
                            $variant_array[$key][] = $e;
                        }
                    }
                }
            $data['attributes'] = Variation::select('id','attribute_name')->get()->toArray();
            $data['variant_array'] = $variant_array;
            //dd($json_var);
            $data['json_variation'] = $json_var;

            if($data['pivot'] ==  null){
                return view('404');
            }
        }else{
            $data['pivot'] =  productpivot::where('product_id',$data['product']->id)->where('currency_id',Settings::SelectedCurrency()->id)->get()->first();
            if($data['pivot'] ==  null){
                return view('404');
            }
        }
        //$data['variant_array'] = $variant_array;
        $data['category'] = ProductInCategory::where('product_id',$data['product']->id)->get()->first();
        $data['all_cat'] = ProductInCategory::where('category_id',$data['category']->category_id)->get();
        $data['currency_symbol'] = Settings::SelectedCurrency();

        $data['images']  = media::where('reference_id',$data['product']->id)->where('reference_type','product')->get()->all();
        $data['product_reviews']  = ProductReviews::where('product_id',$data['product']->id)->get()->count();
        $data['related_product']  = RelatedProduct::where('product_id',$data['product']->id)->select('parent_id')->first();
        $data['relatedProduct'] = RelatedProduct::leftJoin('products', 'products.id', '=', 'related_products.product_id')
            ->where('parent_id',$data['related_product']->parent_id)
            ->select('products.id','products.slug','related_products.option_name')
            ->get();
        $data['sizechart']  = media::where('reference_id',$data['product']->id)->where('reference_type','sizechart')->get()->first();
        return view('frontend.product.single-product',$data);
    }

    public function cart()
    {
//        dd(session('cart'));
//        foreach(session('cart') as $details)
//        {
//            $product_variant = ProductVariant::where('id',$details['varient_id'])->select('variant_options')->get()->first();
//            foreach (json_decode($product_variant->variant_options) as $key => $value)
//            {
//                $product_values = current((array)$value);
//                $variations[] = Variation::where('id',key((array)$value))->select('attribute_name')->get()->first();
//            }
//            $datassss[] = [
//                'variations' => $variations,
//                'productinfo' => $details,
//            ];
//        }
//        dd($datassss);




        $currency_id = Settings::SelectedCurrency()->id;
        $data['currency'] = Currency::where('id',$currency_id)->select('currency_rate')->get()->first();
        $data['ship'] = ShippingMethods::where('status',1)->select('value')->get()->first();
        $shipemt_charges = $data['currency']['currency_rate'] * $data['ship']['value'];
        return view('frontend.product.cart',compact('shipemt_charges'));
    }

    public function varsRate(Request $request )
    {
           $variations = ProductVariant::where(['product_id' => $request->id,'currency_id' => Settings::SelectedCurrency()->id])->get();
           foreach($variations as $row)
           {
              foreach (json_decode($row->variant_options) as $key => $value){
                  $va[] =$value;
              }
if(empty(array_diff(['male','black','L'], json_decode($row->variant_options)))){
    $wow[] = [
        'id'=>$row->id
               ];
                }
              }
            }

    public function addToCart(Request $request)
    {

//        session()->forget('cart');
        $currency_id = Settings::SelectedCurrency()->id;
        $product = Product::findOrFail($request->product_id);
        if($product->is_variant == null){
            $product_detail = productpivot::where(['product_id' => $product->id,'currency_id' => $currency_id])->get()->first();
        }
        else{
            $product_detail = ProductVariant::where(['product_id' => $product->id,'currency_id' => $currency_id])->get()->first();
        }

        $image = media::where('reference_id', $request->product_id )->where('reference_type', 'product')->get()->first();
        $cart = session()->get('cart' , []);
        $id = $request->product_id;

        $color [] = array($request->color,$request->size,);
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] + (int)$request->quantity;
        } else {
            $cart[$id] = [
                "name" => $product->title,
//                "varient_id"=>$request->varient_id,
                "varient_id"=>$product_detail->id,
                "quantity" => $request->quantity,
                "discount_price" => $product_detail->discounted_price,
                "compare_price" => $product_detail->compare_price,
                "image" => $image->image,
                "color" => $color,
                "size" => $request->size,

            ];
        }
        session()->put('cart', $cart);

//        return view('frontend/ecommerce-layouts/error')->with('success', 'Product added to cart successfully!');
    }

    public function updateCart(Request $request)
    {
        $currency_id = Settings::SelectedCurrency()->id;

        $data['currency'] = Currency::where('id',$currency_id)->select('currency_rate')->get()->first();
        $data['ship'] = ShippingMethods::where('status',1)->select('value')->get()->first();

        $shipemt_charges = $data['currency']['currency_rate'] * $data['ship']['value'];
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);

            return view('frontend/ecommerce-layouts/cart-append',compact('shipemt_charges'));

//            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {

        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    public function checkout()
    {

        $currency_symbol = Settings::SelectedCurrency()->currency_symbol;

        if(!session('cart')){

            return redirect('/');
        }

        if(session()->has('cart') )
        {
            $sess_count = session('cart');

            if($sess_count == 0)
            {
                return redirect('/');

            }
        }

        // for calculating shipping charges
        $currency_id = Settings::SelectedCurrency()->id;
        $data['currency'] = Currency::where('id',$currency_id)->select('currency_rate')->get()->first();
        $data['ship'] = ShippingMethods::where('status',1)->select('value')->get()->first();
        $shipemt_charges = $data['currency']['currency_rate'] * $data['ship']['value'];
        return view('frontend.product.checkout',compact('shipemt_charges','currency_symbol'));
    }


    public function checkout_details(Request $request)
    {

        if (session('cart') != null) {


            $this->validate($request, [
                'terms_condition' => 'required',
                'guest_email' => 'required'
            ]);

            $customer = User::where('email', $request->guest_email)->get()->first();

            if ($customer == null) {
                $user = [

                    'name' => 'user',
                    'email' => $request->guest_email,
                    'user_type' => 'customer',
                ];
                $createnew = User::create($user);
            } else {


            }
//            die();
//        }
            foreach (session('cart') as $id => $detail) {
                $order_id[] = $id;
                $var_id[] = $detail['quantity'];
            }
            $order_data = [
                'product_id' => json_encode($order_id),
                'variation_id' => json_encode($var_id),
                'user_id' => auth()->user()->id,
                'discount_id' => $request->discount_id,
                'grand_total' => $request->grand,
            ];
//
//
            $orderdetail = orderDetails::create($order_data);
//
//
            if ($request->shipping_type == 'default') {

                $shipping_data = [
                    'ship_type' => 'default',
                    'order_id' => $orderdetail->id,
                    'shipping_first_name' => $request->shipping_first_name,
                    'shipping_last_name' => $request->shipping_last_name,
                    'shipping_country' => $request->shipping_country,
                    'shipping_zip_code' => $request->shipping_zip_code,
                    'shipping_street_address' => $request->shipping_street_address,
                    'shipping_apartment_detail' => $request->shipping_apartment_detail,
                    'shipping_city' => $request->shipping_city,
                    'shipping_state' => $request->shipping_state,
                    'shipping_phone' => $request->shipping_phone,
                    'billing_first_name' => $request->shipping_first_name,
                    'billing_last_name' => $request->shipping_last_name,
                    'billing_country' => $request->shipping_country,
                    'billing_zip_code' => $request->shipping_zip_code,
                    'billing_street_address' => $request->shipping_street_address,
                    'billing_apartment_detail' => $request->shipping_apartment_detail,
                    'billing_city' => $request->shipping_city,
                    'billing_state' => $request->shipping_state,
                    'billing_phone' => $request->shipping_phone,

                ];

                $shipping_detail = shipmentDetails::create($shipping_data);
            } else {

                $shipping_data = [

                    'ship_type' => 'shipping',
                    'order_id' => $orderdetail->id,
                    'shipping_first_name' => $request->shipping_first_name,
                    'shipping_last_name' => $request->shipping_last_name,
                    'shipping_country' => $request->shipping_country,
                    'shipping_zip_code' => $request->shipping_first_name,
                    'shipping_street_address' => $request->shipping_first_name,
                    'shipping_apartment_detail' => $request->shipping_first_name,
                    'shipping_city' => $request->shipping_first_name,
                    'shipping_state' => $request->shipping_first_name,
                    'shipping_phone' => $request->shipping_first_name,
                    'billing_first_name' => $request->billing_first_name,
                    'billing_last_name' => $request->billing_last_name,
                    'billing_country' => $request->billing_country,
                    'billing_zip_code' => $request->billing_zip_code,
                    'billing_street_address' => $request->billing_street_address,
                    'billing_apartment_detail' => $request->billing_apartment_detail,
                    'billing_city' => $request->billing_city,
                    'billing_state' => $request->billing_state,
                    'billing_phone' => $request->billing_phone,
                ];

                $shipping_detail = shipmentDetails::create($shipping_data);
            }

//            $result = PaymentGatewayController::exampleFunctionStatic($request);
            return view('frontend.product.checkout');
        }
        else
        {
            dd('cart is empty');
        }
    }


    public function collection($id)
    {

        $product = [];
        $DataCollection = [];
        $all = Str::lower($id);

        if ($all == 'all') {
            $products = product::get();
        }
        else {
            $Category = categories::where('slug', $id)->get()->first();
            $ProductInCategory = ProductInCategory::where('category_id',$Category->id)->pluck('product_id')->toArray();
            $products = product::whereIn('id',$ProductInCategory)->get();
        }


        $data['variations'] = Variation::where('status',1)->get();
        $data['product'] = ecommerce::ProductData($products);
        $data['gallery'] = Gallery::get();
        $data['brand'] = Brand::where('status',1)->get();
        return view('frontend.product.collection',$data);
    }

    public function couponDiscount(Request $request)
    {


        $discount_code = $request->data;
        $discount = CouponDiscount::where('discount_code',$discount_code)->get()->first();
        if($discount != null)
        {
            $coup_discount = $discount->value;
            $discount = [
                "discounted_price" => $coup_discount,
            ];

            session()->put('discount',$discount);



            return json_encode(array('success'=>true,'msg'=>"Coupon code applied",'redirect'=>'')) ;
        }
        else
        {
            return json_encode(array('success'=>false,'msg'=>"Coupon doesn't exists",'redirect'=>'')) ;
        }
    }

//    public function orderdetail()
//    {
////        dd(auth()->user()->id);
//        $product=Product::get();
//        $orderdetail = orderDetails::get();
//        foreach($orderdetail as $order)
//        {
//        if(auth()->user()->id==$order->user_id)
//        {
//            $products = product::where(auth()->user()->id,$order->user_id)->get()->all();
//            dd($product);
//        }
//        else
//        {
//            dd('Annnaas');
//        }
//        }
//        return view('frontend.order-detail.index',compact('orderdetail'));
//    }

}
