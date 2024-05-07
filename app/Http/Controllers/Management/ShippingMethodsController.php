<?php

namespace App\Http\Controllers\Management;
use App\Http\Controllers\Controller;
use App\Models\media;
use App\Models\ShippingMethods;
use Illuminate\Http\Request;

class ShippingMethodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippingMethods = ShippingMethods::get();
        return view('management.shipping_method.index',compact('shippingMethods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management.shipping_method.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required',

        ]);

        if ($request->file('image')) {
            $mainext = $request->file('image')->getClientOriginalExtension();
            $main_file = 'shipping'.time() . rand(1000, 14000000000) . '.' . $mainext;
            $request->image->move(public_path('images/media'), $main_file);
        } else {
            $main_file = null;
        }

        $image_url = asset('images/media/'.$main_file);

        $data = [
            'title' => $request->title,
            'image'=> $main_file,
            'status' => $request->status,
        ];
        $shippingMethods = ShippingMethods::create($data);

        $multi_image=
            [
                'reference_id' => $shippingMethods->id,
                'reference_type'=>'shipping',
                'image' => $main_file,
            ];

        $multi = media::create($multi_image);
        return redirect()->back()->with('success', 'Shipping added succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShippingMethods  $shippingMethods
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $language = ShippingMethods::where('id',$id)->get()->first();
        return view('management/shipping_method/edit',compact('language'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShippingMethods  $shippingMethods
     * @return \Illuminate\Http\Response
     */
    public function edit(ShippingMethods $shippingMethods)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShippingMethods  $shippingMethods
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $shippingMethods = ShippingMethods::where('id',$id)->get()->first();

        $multi = media::where('reference_id', $id)->where('reference_type','shipping')->get()->first();

        if($request->file('image')){

            $ext = $request->file('image')->getClientOriginalExtension();
            $main_file = 'shipping'.time() . rand(1000, 14000000000) . '.' . $ext;
            $request->image->move(public_path('images/media'), $main_file);
        }
        else
        {
            $main_file = $multi->image;
        }

        $image_url = asset('images/media/'.$main_file);


        $shippingMethods->update([
           'title' => $request->title,
            'image'=> $main_file,
            'status' => $request->status,
        ]);

        if($multi != null ){
            $multi->update([
                'image' => $main_file,
            ]);
        }else {
            $multi_image =
                [
                    'reference_id' => $id,
                    'reference_type' => 'shipping',
                    'image' => $main_file,
                ];

            media::create($multi_image);
        }

        return redirect()->back()->with('success','Shipping updates Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShippingMethods  $shippingMethods
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shippingMethods = ShippingMethods::where('id',$id)->delete();
        return  redirect()->back()->with('success', 'Shipping deleted successfully');
    }
}
