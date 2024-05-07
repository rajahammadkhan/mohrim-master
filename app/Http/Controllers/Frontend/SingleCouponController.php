<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Models\categories;
use App\Models\coupon;
use App\Models\country;
use App\Models\media;
use App\Models\seo;
use App\Models\store;
use Illuminate\Http\Request;
use Route;
use Session;

class SingleCouponController extends Controller
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
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(categories $categories,$id)
    {
//        $coun = Session::get('country');
        $data['coupon'] = coupon::where('status', 1)->where('slug',$id)->get()->first();
        if(!$data['coupon']){
            return view('404');
        }
        $data['seo'] = seo::where('reference_type','coupon')->where('reference_id', $data['coupon']->id)->get()->first();
        $data['media'] = media::where('reference_type','coupon')->where('reference_id', $data['coupon']->id)->get();
        $data['category'] =  categories::where('id',$data['coupon']->category_id)->get()->first();
        $data['store'] =  store::where('id',$data['coupon']->store_id)->get()->first();
        $wow =  country::where('id',$data['coupon']->country_id)->get()->first();
        $data['country'] = asset('flags/'.strtolower($wow->iso).'.svg');

        return view('frontend/coupon/index',$data);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
    //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(categories $categories,$id)
    {

  //

    }
    public function get_code($id)
    {

$data['coupon'] = coupon::where('id',base64_decode($id))->first();
return view('frontend/coupon/get-code',$data);

    }
}
