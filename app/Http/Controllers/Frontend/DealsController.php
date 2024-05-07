<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\orderDetails;
use App\Models\seo;
use Session;
use App\Models\Variation;
use App\Models\ProductVariant;
use App\Models\coupon;
use App\Models\media;
use App\Models\Contact;
use Illuminate\Http\Request;

class DealsController extends Controller
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
    public function SearchResult(Request $request)
    {
        $coupon =array();
        if($request->category != null && $request->coupon != null) {
            $coupons = coupon::where('category_id', base64_decode($request->category))
                ->where('title', 'like', "%$request->coupon%")
                ->get();
        }elseif($request->category  != null && $request->coupon == null){
            $coupons = coupon::where('category_id', base64_decode($request->category))

                ->get();
        }elseif($request->category  == null && $request->coupon != null){
            $coupons = coupon::where('title', 'like', "%$request->coupon%")
                ->get();
        }

        foreach ($coupons as $row) {
            $seo = seo::where(['reference_type' => 'coupon', 'reference_id' => $row->id])->get()->first();
            $media = media::where(['reference_type' => 'coupon', 'reference_id' => $row->id])->get();
            $coupon[] = [
                'basic' => $row,
                'media' => $media,
                'seo' => $seo
            ];
        }
        $column = 3;
        return   view('frontend/search/index',compact('coupon','column'));

    }


    public function ContactPost(Request $request)
    {
        Contact::create($request->all());
        return redirect()->back()->with('success','Your Query Has been submitted');
    }

    public function orderdetail()
    {
        $data['orderdetail'] = orderDetails::where('user_id',1)->get();
        foreach($data['orderdetail'] as $order)
        {
            $prid = json_decode($order->product_id);
            $allp[]  = Product::whereIn('id',$prid)->get();
        }
        foreach($allp as $prod)
        {
            $productdet=$prod->map(function ($prod)
            {
                $abc=$prod->is_variant;
            });
//            if($productdet!= null)
//            {
//                $productdet = ProductVariant::where('product_id',$prod->id)->get();
//            }
//            else
//            {
//                $productdet = orderDetails::where('product_id',$prod->id)->get();
//            }
        }
//        dd($productdet);
//        if($prod==1)
//        {
//            dd('yahoo');
////            $data['productvarient']=ProductVariant::where('id',$varientid)->get();
////            foreach($data['productvarient']  as $row)
////            {
////                $data['variations'] = implode(" ",json_decode($row->variant_options));
////            }
//        }
//        else
//        {
//            dd('bahoo');
//        }

//        foreach ($allp  as $row)
//        {
//            dd(($row->id));
//            if (in_array($row->id,$prodid))
//            {
//                dd('yahoo');
//            }
//            else
//            {
//                dd('yahoo');
//            }
//        }

//        $data['product']=Product::select($prodid)->get();

//        $data['media'] = orderDetails::get()->groupBy('user_id');
//        dd($data['orderdetail']);
//        foreach($data['orderdetail'] as $order)
//        {
//            if(auth()->user()->id==$order->user_id)
//            {
//                $data['products'] = product::where('id',$order->product_id)->get()->all();
//                foreach($data['products']  as $row)
//                {
//                    $data['tittle'] = $row->title;
//                }
//                $data['variation'] = Variation::where('id',$order->variant_id)->get()->all();
//                foreach($data['variation']  as $row)
//                {
//                    $data['variations'] = implode(" ",json_decode($row->variations));
//                }
//            }
//        }


        return view('frontend.dashboard.order-detail.index',$data);
    }


}
