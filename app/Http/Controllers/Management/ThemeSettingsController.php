<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;

use App\Models\country;
use Illuminate\Http\Request;
use DB;

class ThemeSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $data['types'] =[
                'header'=>'Header',
                'country'=>'Country',
                'coupon'=>'Coupon',
                'store'=>'Store',
                'blog'=>'Blog',
//               'product'=>'Product',
//               'subscription'=>'Subscription',
                'header'=>'Header',
                'category'=>'Category',
                'home'=>'Home',
            ];
        $data['settings'] = DB::table('settings')->get()->groupBy('type');


//        dd($data['settings']);
        return view('management/setting/index',$data);

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
//        $this->validate($request,[
//            'checkbox' => 'required',
//        ]);
//        $countries = DB::table('country')->where('status',1)->update(['status' => 0]);
//        foreach ($request->checkbox as $country)
//        {
//            $coun = DB::table('country')->where('id',$country)->update(['status' => 1]);
//        }
//        return redirect()->back()->with('success','Fields Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(country $country)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //

foreach ($request->id as $key=>$value){
    $wow =        DB::table('settings')->where('id',$value)->limit(1);
//dd($wow);
    $wow->update([
        'choose'=>(isset($request->choose[$value]) ? $request->choose[$value] : 'off'),
    ]);

}
return redirect()->back()->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(country $country)
    {
        //
    }
    public function theme_setting_fields(Request $request)
    {
$data = [
    'title'=>$request->title,

    'type'=>$request->type,
    'option_key'=>$request->option_key,
    'input_type'=>$request->input_type,
    'input_type_key'=>json_encode($request->input_type_key),

];
        DB::table('settings')->insert($data);
        return redirect()->back()->with('success','Settings Fields Created Successfully');

    }
}
