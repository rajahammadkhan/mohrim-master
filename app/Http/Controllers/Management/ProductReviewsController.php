<?php

namespace App\Http\Controllers\Management;
use App\Http\Controllers\Controller;
use App\Models\ProductReviews;
use Illuminate\Http\Request;

class ProductReviewsController extends Controller
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
        $data = [
            "user_id"=>auth()->user()->id,
            "product_id"=>$request->product_id,
            "rating"=>$request->rating,
            "name"=>$request->name,
            "email"=>$request->email,
            'comment'=>$request->comment,
        ];
        $productreview = ProductReviews::create($data);
         if ($request->rating > 1) {
             return redirect()->back()->with('success','Thanks! You rated this '.$request->rating.' stars');
         }
         else {
             return redirect()->back()->with('success','We will improve ourselves. You rated this '.$request->rating.' stars');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product_Reviews  $product_Reviews
     * @return \Illuminate\Http\Response
     */
    public function show(Product_Reviews $product_Reviews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product_Reviews  $product_Reviews
     * @return \Illuminate\Http\Response
     */
    public function edit(Product_Reviews $product_Reviews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product_Reviews  $product_Reviews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product_Reviews $product_Reviews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product_Reviews  $product_Reviews
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product_Reviews $product_Reviews)
    {
        //
    }
}
