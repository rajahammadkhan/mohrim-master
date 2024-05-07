<?php

namespace App\Http\Controllers\Management;
use App\Http\Controllers\Controller;
use App\Models\Variation;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variation = variation::get();
        return view('management.variation.index',compact('variation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management.variation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $variant= explode(",",$request->variations);




        $data = [
            "status" =>$request->status,
            "attribute_name" =>$request->attribute_name,
            "variations" =>json_encode($variant),
            "variations_view" =>$request->variations,
        ];
        



        $variation = Variation::create($data);
        return redirect()->route('variation.show',$variation->id)->with('success','Variation has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $language = Variation::where('id',$id)->get()->first();
        return view('management/variation/edit',compact('language'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function edit(Variation $variation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = Variation::where('id',$id)->get()->first();

        $variant= explode(",",$request->variations);


        $data->update([
            "status"=>$request->status,
            "attribute_name"=>$request->attribute_name,
            "variations"=>json_encode($variant),
            "variations_view" =>$request->variations,

        ]);
        return redirect()->back()->with('success','Variations has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Variation::where('id',$id)->get()->first()->delete();
        return redirect()->back()->with('success','Data has been deleted Successfully');
    }
}
