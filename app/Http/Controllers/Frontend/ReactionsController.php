<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Route;
use Session;
use DB;
class ReactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blogs'] = blog::where('status', 1)->get()->all();

        return view('frontend/blogs/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $img = $request->image;

        $category_type = base64_decode($_GET['type']);

        if (isset($_GET['type'])) {
            if ($request->file('image')) {
                $mainext = $request->file('image')->getClientOriginalExtension();
                $main_file = time() . rand(1000, 14000000000) . '.' . $mainext;
                $request->image->move(public_path('images/categories'), $main_file);
            } else {
                $main_file = null;
            }
            $category_type = base64_decode($_GET['type']);


            $data = [
                'title' => $request->title,
                'long_description' => $request->description,
                'status' => $request->status,
                'reference_type' => $category_type,
                'image' => $main_file,
                'parent_category' => $request->parent_category,
            ];
            $categories = categories::create($data);

            $seo = [
                'reference_id' => $categories->id,
                'meta_title' => $request->meta_title,
                'reference_type' => $category_type,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
            ];

            $search = seo::create($seo);
            return redirect()->back()->with('success', 'Category Created successfully');

        } else {
            return abort('404');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\categories $categories
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data['blog'] = blog::where('slug', $slug)->get()->first();

        $data['comments'] = DB::table('reactions')
            ->where('type', 'comment')
            ->where('reference_type', 'blog')
            ->where('reference_id', $data['blog']->id)->get();
        return view('frontend/blogs/show', $data);


    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\categories $categories
     * @return \Illuminate\Http\Response
     */


    public function collection($slug)
    {


    }

    public function edit(categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\categories $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\categories $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(categories $categories, $id)
    {
        //
    }


    public function CommentPost(Request $request)
    {


        if (isset($request->ReferenceId) && $request->ReferenceType) {
            if ($request->file('image')) {
                $mainext = $request->file('image')->getClientOriginalExtension();
                $main_file = time() . rand(1000, 14000000000) . '.' . $mainext;
                $request->image->move(public_path('images/comment/' . $request->ReferenceType), $main_file);
            } else {
                $main_file = null;
            }

            $ReferenceId = base64_decode($request->ReferenceId);
            $data = [
                'reference_type' => $request->ReferenceType,
                'reference_id' => (int)$ReferenceId,
                'user_id' => Auth::user()->id,
                'comments' => $request->comment,
                'type' => 'comment',
                'image' => $main_file
            ];
            DB::table('reactions')->insert($data);
            return redirect()->back()->with('success', 'Category Created successfully');

        } else {
            return redirect()->back()->with('wrong', 'Unknown Error! Missing Parameter');

        }

    }





    public function LikePost(Request $request){
        if(auth()->check()){
        $data = [
            'reference_type' => $request->type,
            'reference_id' => $request->id,
            'user_id' => Auth::user()->id,
            'type' => $request->reaction,

        ];
      $wow =  DB::table('reactions')->insert($data);
      if($wow){
          $like =  DB::table('reactions')
              ->where('type',$request->reaction)
              ->where('reference_type',$request->type)
              ->where('reference_id',$request->id)->get();
          return count($like);
      }
        }else{
            return 'false';
        }
    }

    public function DislikePost(Request $request){

        if(\auth()->check()){
        DB::table('reactions')
                ->where('type',$request->reaction)
                ->where('user_id',auth()->user()->id)
                ->where('reference_type',$request->type)
                ->where('reference_id',$request->id)->delete();
        $like =  DB::table('reactions')
            ->where('type',$request->reaction)
            ->where('reference_type',$request->type)
            ->where('reference_id',$request->id)->get();
           
        return count($like);

        }else{
            return 'ffalse';
        }
    }






}
