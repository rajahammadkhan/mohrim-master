<?php

namespace App\Http\Controllers\Management\Coupon;
use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\country;
use App\Models\seo;
use App\Models\store;
use App\Models\blog;
use Illuminate\Http\Request;
class StoreController extends Controller
{
//    function __construct()
//    {
//        $this->middleware('permission:store-list|store-create|store-edit|', ['only' => ['index','show']]);
//        $this->middleware('permission:store-create', ['only' => ['create','store']]);
//        $this->middleware('permission:store-edit', ['only' => ['edit','update']]);
//        $this->middleware('permission:store-delete', ['only' => ['destroy']]);
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = store::get();
        return view('management.store.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = categories::where('reference_type','store')->get();
        $countries = country::where('status',1)->get();
        return view('management.store.create',compact('cate','countries'));
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
            'title' => 'required',

        ]);

        if ($request->file('image')) {
            $mainext = $request->file('image')->getClientOriginalExtension();
            $main_file = time() . rand(1000, 14000000000) . '.' . $mainext;
            $request->image->move(public_path('images/media'), $main_file);
        } else {
            $main_file = null;
        }


        $data = [
            'user_id' => $request->user_id,
            'title' => $request->title,
            'category_id' => $request->category_id,
            'country_id' => $request->country_id,
            'image' => $request->image,
            'description'=> $request->description,
            'image'=> $main_file,
            'status' => $request->status,
        ];

        $categories = store::create($data);
        $seo = [
            'reference_id' => $categories->id,
            'meta_title' => $request->meta_title,
            'reference_type' => 'store',
            'meta_description'=> $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ];

        $search = seo::create($seo);
        return redirect()->route('store.show',$categories->id)->with('success','store has been created ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = store::where('id',$id)->get()->first();
        $seo = seo::where('reference_id',$id)->get()->first();
        $all_category = categories::where('reference_type','store')->get();
        $countries = country::where('status',1)->get();

        return view('management/store/edit',compact('category','seo','all_category','countries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $blogs = store::where('id',$id)->get()->first();
        if($request->file('image')){

            $ext = $request->file('image')->getClientOriginalExtension();
            $main_file = time() . rand(1000, 14000000000) . '.' . $ext;
            $request->image->move(public_path('images/media'), $main_file);
        }
        else
        {
            $main_file = $blogs->image;
        }

        $blogs->update([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'country_id' => $request->country_id,
            'status' => $request->status,
            'image'=> $main_file,
        ]);

        $seo = seo::where('reference_id',$blogs->id)->get()->first();

        $seo->update([
            'reference_id' => $blogs->id,
            'meta_title' => $request->meta_title,
            'meta_description'=> $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);
        return redirect()->back()->with('success','store has been updated');
            }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = store::where('id',$id)->delete();
        $seo = seo::where('reference_id',$id)->delete();
        return  redirect()->back()->with('success','store deleted succesfully');
    }
}
