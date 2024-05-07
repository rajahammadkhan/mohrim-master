<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\media;
use App\Models\Reaction;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Route;
use Session;
use DB;
class UserDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend/dashboard/index');
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
    }

    public function DislikePost(Request $request){
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

    }

    public function activity(){

//        $reaction = Reaction::paginate(12);
//
//        dd($reaction);



        $activity = DB::table('reactions')
            ->where(['type' => 'comment','reference_type' => 'blog'])->where('reactions.user_id',auth()->user()->id)
            ->join('blogs', 'reactions.reference_id', '=', 'blogs.id')
            ->select('reactions.*','blogs.title', 'blogs.slug','blogs.image','blogs.id')
            ->get()->groupby('reactions.reference_id');




        $coupon = DB::table('reactions')
            ->where('type', 'comment')->where('reactions.user_id',auth()->user()->id)
            ->where('reactions.reference_type','coupon')
            ->join('media', 'reactions.reference_id', '=', 'media.reference_id')
            ->join('coupons', 'reactions.reference_id', '=', 'coupons.id')
            ->select('reactions.created_at','reactions.reference_id','coupons.title', 'coupons.slug','coupons.regular_price',
                'coupons.compare_price','coupons.id','media.image')
            ->get()->groupby('reactions.reference_id');




        $comments = Reaction::where('type','comment')->get();

        return view('frontend/dashboard/activity/index',compact('activity','coupon','comments'));

    }

    public function wishList(){

        $reactions = DB::table('reactions')
            ->where(['type' => 'wishlist','reference_type' => 'coupon',
            'user_id' => auth()->user()->id])
            ->join('coupons', 'reactions.reference_id', '=', 'coupons.id')
            ->select('coupons.title', 'coupons.regular_price','coupons.compare_price','coupons.id','coupons.expiry_date')
            ->get();

        $media  = media::get();

        return view('frontend/dashboard/wishlist/index',compact('reactions','media'));

    }

    public function myProfile() {

        $data = User::where('id',Auth()->user()->id)->get();
        return view('frontend/dashboard/profile/index',compact('data'));

    }

    public function updateprofile(Request $request,$id)
    {
        $users = User::where('id',$id)->get()->first();

        if($request->file('image')){

            $ext = $request->file('image')->getClientOriginalExtension();
            $main_file = time() . rand(1000, 14000000000) . '.' . $ext;
            $request->image->move(public_path('images/profile'), $main_file);
        }
        else
        {
            $main_file = $users->image;
        }

        $users->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'image' => $main_file,

        ]);

       return redirect()->back()->with('success','Profile updated succesfully');

    }

    public function password()
    {
        return view('frontend/dashboard/profile/password');
    }

    public function updatePassword(Request $request,$id)
    {


        $data = User::where('id',$id)->get()->first();


        $this->validate($request,[

            'password' => 'required',
            'new_password'=> 'required',
            'confirm_password'=> 'required',

        ]);

        $hashedPassword = auth()->user()->password;

        if (Hash::check($request->password , $hashedPassword)) {

            if ($request->new_password == $request->confirm_password){

                $data->update([

                    'password'=>Hash::make($request->new_password)
                ]);
                return redirect()->back()->with('success','Password Updated Successfully.');

            }
            else
            {
                return redirect()->back()->with('wrong','New Password & Confirm Password  do not match, please try again.');
            }

        }else{

            return redirect()->back()->with('wrong','You Entered a Wrong Current Password');

        }
    }



}
