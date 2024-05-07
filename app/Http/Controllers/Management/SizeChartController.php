<?php

namespace App\Http\Controllers\Management;
use App\Http\Controllers\Controller;
use App\Models\media;
use App\Models\SizeChart;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Reference;

class SizeChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SizeChart = SizeChart::get();
        return view('management.size_chart.index',compact('SizeChart'));
    }

    public function chart()
    {
        $data = SizeChart::get();
        return response()->json(
            [
              'data' => $data,
            ]);


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management.size_chart.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->ajax())
        {

            $data = [
                'name'   => $request->title,
                'status' => 1,
                ];
            $size = SizeChart::create($data);

            if ($request->file('chart_img')) {
                $mainext = $request->file('chart_img')->getClientOriginalExtension();
                $main_file = 'size_chart'.time() . rand(1000, 14000000000) . '.' . $mainext;
                $request->chart_img->move(public_path('images/media'), $main_file);
            } else {
                $main_file = null;
            }
            $img = [
                'reference_id' => $size->id,
                'reference_type' => 'size_chart',
                'image' => $main_file,
            ];

            media::create($img);
            
            return $size;
        }



        if ($request->file('image')) {
            $mainext = $request->file('image')->getClientOriginalExtension();
            $main_file = 'sizeChart'.time() . rand(1000, 14000000000) . '.' . $mainext;
            $request->image->move(public_path('images/media'), $main_file);
        } else {
            $main_file = null;
        }


        $data = [
            "name"=>$request->name,
            "status"=>$request->status,
            'image'=> $main_file,
        ];

        $sizechart = SizeChart::create($data);

        $multi_image=
            [
                'reference_id' => $sizechart->id,
                'reference_type'=>'post',
                'image' => $main_file,
            ];

        $multi = media::create($multi_image);

        return redirect()->route('size_chart.show', $sizechart->id)->with('success','SizeChart Created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SizeChart  $sizeChart
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $language = SizeChart::where('id',$id)->get()->first();
        return view('management/size_chart/edit',compact('language'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SizeChart  $sizeChart
     * @return \Illuminate\Http\Response
     */
    public function edit(SizeChart $sizeChart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SizeChart  $sizeChart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = SizeChart::where('id',$id)->get()->first();
        $multi = media::where('reference_id',$id)->where('reference_type','size_chart')->get()->first();
        
        if($request->file('image')){

            $ext = $request->file('image')->getClientOriginalExtension();
            $main_file = 'size_chart'.time() . rand(1000, 14000000000) . '.' . $ext;
            $request->image->move(public_path('images/media'), $main_file);
        }
        else
        {
            $main_file = $multi->image;
        }

        $data->update([
            "name"=>$request->name,
            "status"=>$request->status,
            "image"=> $main_file,
        ]);

        if($multi != null ){
            $multi->update([
                'image' => $main_file,
            ]);
        }else {
            $multi_image =
                [
                    'reference_id' => $id,
                    'reference_type' => 'size_chart',
                    'image' => $main_file,
                ];

            media::create($multi_image);
        }
        return redirect()->back()->with('success','SizeChart Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SizeChart  $sizeChart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = SizeChart::where('id',$id)->get()->first()->delete();
        return redirect()->back()->with('success','Brand Delete successfully');
    }
}
