<?php

namespace App\Http\Controllers\Management;
use App\Http\Controllers\Controller;
use App\Models\CouponDiscount;
use Illuminate\Http\Request;

class CoupenDiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd('');
        $coupon_discount = CouponDiscount::get();
//        dd($coupon_discount);
        return view('management.coupon_discount.index',compact('coupon_discount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management.coupon_discount.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            "discount_type"=>$request->discount_type,
            "value"=>$request->value,
            'is_applied' => $request->is_applied,
            "status"=>$request->status,
        ];

        $coupon_discount = CoupenDiscount::create($data);
        return redirect()->route('coupon_discount.show',$coupon_discount->id)->with('success','CoupenDiscount Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CoupenDiscount  $coupenDiscount
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $language = CoupenDiscount::where('id',$id)->get()->first();
        return view('management/coupon_discount/edit',compact('language'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoupenDiscount  $coupenDiscount
     * @return \Illuminate\Http\Response
     */
    public function edit(CoupenDiscount $coupenDiscount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CoupenDiscount  $coupenDiscount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = CoupenDiscount::where('id',$id)->get()->first();
        $data->update([
            "discount_type"=>$request->discount_type,
            "value"=>$request->value,
            'is_applied' => $request->is_applied,
            "status"=>$request->status,
        ]);
        return redirect()->back()->with('success','CoupenDiscount Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoupenDiscount  $coupenDiscount
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = CoupenDiscount::where('id',$id)->get()->first()->delete();
        return redirect()->back()->with('success','CoupenDiscount Delete successfully');
    }
}
