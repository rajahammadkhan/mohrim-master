<?php


namespace App\Http\Controllers\Management\Coupon;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\country;
use App\Models\coupon;
use App\Models\blog;
use App\Models\Reaction;
use App\Models\seo;
use App\Models\media;
use App\Models\store;
use Illuminate\Http\Request;
use function GuzzleHttp\json_decode;

class CouponController extends Controller
{
//
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $bl = $_GET['type'];
        $type = base64_decode($bl);
        $category = coupon::where(['coupon_type' => $type])->get();
        $media = media::where('reference_type','coupon')->get()->groupBy('reference_id');
        return view('management.coupon.index',compact('category','media'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = country::where('status',1)->get();
        $cate = categories::where('reference_type','coupon')->get();
        $store = store::get();
        return view('management.coupon.create',compact('cate','country','store'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'category_id' => 'required',
                'regular_price' => 'required',
                'expiry_date' => 'required',
                'country_id' => 'required',
                'affiliate_url' =>'required',
                'store_id'=>    'required',

            ],
            [
                'title.required' => 'Title is required',
                'category_id.required' => 'category is required',
                'regular_price.required' => 'regular price is required',
                'expiry_date.required' => 'expiry date is required',
                'country_id.required' => 'country  is required',
                'affiliate_url.required' => 'affliliate url is required',
                'store_id' => 'store is required',

            ]
        );

        if($request->compare_price && $request->regular_price != null)
        {
            $dis = ($request->regular_price / $request->compare_price) * 100;
            $discount = 100 - (int)$dis;
        }
        else{
            $discount = null;
        }
        $current =  date('Y-m-d H:i:s');
        $exp = $request->start_date != null ? $request->start_date = date('Y-m-d H:i:s', strtotime($request->start_date)) : $current;
        $end = date( 'Y-m-d H:i:s', strtotime($request->expiry_date));

        $coupon = [
             $request->featured,
            $request->trending,
             $request->popular,
        ];

        $data = [
            'title' => $request->title,
            'affiliate_url' => $request->affiliate_url,
            'category_id' => $request->category_id,
            'long_description'=> $request->long_description,
            'short_description'=> $request->short_description,
            'status' => $request->status,
            'country_id' => $request->country_id,
            'store_id' => $request->store_id,
            'start_date'=>$exp,
            'expiry_date'=>$end,
            'regular_price'=>$request->regular_price,
            'compare_price' => $request->compare_price,
            'coupon_graph'=>json_encode($coupon),
            'fullfilled'=>$request->fullfilled,
            'coupon_type'=>$request->coupon_type,
            'coupon_code'=>$request->coupon_code,
            'discount'=>(int)$discount,
        ];

        $categories = coupon::create($data);
        if($request->file('image'))
        {
            foreach($request->file('image') as $image)
            {
                $mainext = $image->getClientOriginalExtension();
                $main_file = time() . rand(1000, 14000000000) . '.' . $mainext;
                $image->move(public_path('/images/media'), $main_file);

                $multi_image=
                    [
                        'reference_id' => $categories->id,
                        'reference_type'=>'coupon',
                        'image' => $main_file,
                    ];

                $multi = media::create($multi_image);



            }
        }
        else{

        }
        $seo = [
            'reference_id' => $categories->id,
            'meta_title' => $request->meta_title,
            'reference_type' => 'coupon',
            'meta_description'=> $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ];
        $search = seo::create($seo);


        return redirect()->route('coupon.show',$categories->id.'?type='.base64_encode($request->coupon_type));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country = country::where('status',1)->get();
        $category = coupon::where('id',$id)->get()->first();
        $seo = seo::where('reference_id',$id)->get()->first();
        $media = media::where('reference_id',$id)->where('reference_type','coupon')->get();

        $all_category = categories::where('reference_type','coupon')->get();
        $store = store::get();

        $coup = json_decode($category->coupon_graph);


        return view('management/coupon/edit',compact('category','seo','all_category','country','store','coup','media'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
//        dd($request);

        if($request->file('editimage')){
            foreach($request->file('editimage') as $key => $value)
            {
                $mainext = $value->getClientOriginalExtension();
                $main_file = time() . rand(1000, 14000000000) . '.' . $mainext;
                $value->move(public_path('/images/media'), $main_file);




                $multi = media::where('id',$key)->update(
                    [
                        'image' => $main_file,
                    ]
                );



            }

        }
        if($request->file('image')){
            foreach($request->file('image') as $key => $value)
            {


                $mainext = $value->getClientOriginalExtension();
                $main_filenew = time() . rand(1000, 14000000000) . '.' . $mainext;
                $value->move(public_path('/images/media'), $main_filenew);



                $multi_image=
                    [
                        'reference_id' => $id,
                        'reference_type'=>'coupon',
                        'image' => $main_filenew,
                    ];

                $multi = media::create($multi_image);



            }

        }

        $request->validate(
            [
                'title' => 'required',
                'category_id' => 'required',
                'regular_price' => 'required',
                'expiry_date' => 'required',
                'country_id' => 'required',
                'affiliate_url' =>'required',
                'store_id'=>    'required',

            ],
            [
                'title.required' => 'Title is required',
                'category_id.required' => 'category is required',
                'regular_price.required' => 'regular price is required',
                'expiry_date.required' => 'expiry date is required',
                'country_id.required' => 'country  is required',
                'affiliate_url.required' => 'affliliate url is required',
                'store_id' => 'store is required',

            ]
        );
        $coupon = coupon::where('id',$id)->get()->first();

        $current =  date('Y-m-d H:i:s');
        $start = $request->start_date != null ? $request->start_date = date('Y-m-d H:i:s', strtotime($request->start_date)) : $current;
        $end = date( 'Y-m-d H:i:s', strtotime($request->expiry_date));

        $coup = [
            $request->featured,
            $request->trending,
            $request->popular,

        ];

        if($request->compare_price && $request->regular_price != null)
        {
            $dis = ($request->regular_price / $request->compare_price)  *100;
            $discount = 100 - (int)$dis;
        }
        else{
            $discount = null;
        }

        $start = date( 'Y-m-d H:i:s', strtotime($request->start_date));
        $end = date( 'Y-m-d H:i:s', strtotime($request->expiry_date));

        $coupon->update([
            'title' => $request->title,
            'affiliate_url' => $request->affiliate_url,
            'category_id' => $request->category_id,
            'long_description'=> $request->long_description,
            'short_description'=> $request->short_description,
            'status' => $request->status,
            'store_id' => $request->store_id,
            'start_date'=>$start,
            'expiry_date'=>$end,
            'regular_price'=>$request->regular_price,
            'compare_price' => $request->compare_price,
            'coupon_graph'=>json_encode($coup),
            'fullfilled'=>$request->fullfilled,
            'coupon_type'=>$request->coupon_type,
            'coupon_code'=>$request->coupon_code,
            'discount'=> (int)$discount,

//
        ]);

        $seo = seo::where('reference_id',$coupon->id)->get()->first();

        $seo->update([
            'reference_id' => $coupon->id,
            'meta_title' => $request->meta_title,
            'meta_description'=> $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);
        return redirect()->back()->with('success','Coupon Updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = coupon::where('id',$id)->delete();

        return  redirect()->back()->with('success', 'Coupon Deleted Succesfully');
    }


    public function imagedelete(Request  $request)
    {


        $categories = media::where('id',$request->id)->delete();

       return true;
    }

    public function search(Request $request)
    {


        $min = coupon::min('regular_price');
        $max = coupon::max('regular_price');
        $minimum = $request->min_price != null ? $request->min_price : 0;
        $maximum = $request->max_price != null ? $request->max_price : null;
        $coupon = [];


//
        $catall = $request->category;


  if(isset($request->c_type)) {
      $elite = coupon::where(['status' => 1, 'coupon_type' => $request->c_type]);
  }else{
      $elite = coupon::where(['status' => 1]);
  }


$elite->where('regular_price', '>=',(int)$minimum);

if($maximum != null){
    $elite->where('regular_price', '<=',(int)$maximum);
}

if($request->fullfilled != null){
    $elite->where('fullfilled',$request->fullfilled);
}
if($request->category !=null){
    $elite->whereIn('category_id',$request->category);
}
if($request->discount != 'all'){
                $serial = (unserialize($request->discount));
    $elite->whereBetween('discount', [$serial['min'], $serial['max']]);
}
if($request->range != null)
{
    if($request->range == '0'){
        $elite->orderBy('id', 'asc');
    }
    elseif($request->range == '1') {
        $elite->orderBy('regular_price', 'asc');
    }
    elseif($request->range == '2'){
        $elite->orderBy('regular_price', 'desc');
    }
    else
    {
        $elite->orderBy('id', 'desc');
    }
}


//
//
//        $range = [];
        $allcoup =  $elite->get();




        if ($allcoup) {
            foreach ($allcoup as $row) {
                $current_date = date('Y-m-d ');
                $currentDate = date('Y-m-d', strtotime($current_date));
                $startDate = date('Y-m-d', strtotime($row->start_date));
                $endDate = date('Y-m-d', strtotime($row->expiry_date));

                if ($startDate <= $currentDate && $currentDate <= $endDate) {

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
                } else {
                }
            }
        }


        $column = isset($data['col']) ? $data['col'] : '2half';
        return view('frontend/snippets/coupons_loop',compact('coupon','column'));
    }
 }
