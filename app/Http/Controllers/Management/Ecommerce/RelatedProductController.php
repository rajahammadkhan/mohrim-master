<?php


namespace App\Http\Controllers\Management\Ecommerce;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\RelatedProduct;
use Illuminate\Http\Request;

class RelatedProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = RelatedProduct::where('parent_id','!=',null)
            ->get()->groupBy('parent_id');

        return view('ecommerce/relatedproduct/index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ecommerce/relatedproduct/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $parent = RelatedProduct::create(
            [
                'user_id' => auth()->user()->id,
                'parent_id' => null,
                'product_id' => null,
                'option_name' => null,
            ]
        );

        $i=0;
        foreach ($request->product_id as $row) {

            $relatedProduct = [
                'user_id' => auth()->user()->id,
                'parent_id' => $parent->id,
                'product_id' => $row,
                'option_name' => $request->option_name[$row],
            ];

            $relatedProduct = RelatedProduct::create($relatedProduct);
            $i++;
        }

        return redirect()->back()->with('success', 'RelatedProduct has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\RelatedProduct $relatedProduct
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $relatedProduct = RelatedProduct::
        leftJoin('products', 'related_products.product_id', '=', 'products.id')
            ->leftJoin('media', 'products.id', '=', 'media.reference_id')
            ->where('reference_type','=','product')
            ->where('related_products.parent_id',$id)
            ->select('products.id as product','products.title','products.status','media.image','related_products.id','related_products.parent_id','related_products.product_id','related_products.option_name')
            ->get();
        return view('ecommerce/relatedproduct/edit',compact('relatedProduct','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\RelatedProduct $relatedProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(RelatedProduct $relatedProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RelatedProduct $relatedProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $abc = RelatedProduct::where('parent_id',$id)->delete();
        foreach ($request->product_id as $row) {
            $relatedProduct = [
                'user_id' => auth()->user()->id,
                'parent_id' => $id,
                'product_id' => $row,
                'option_name' => $request->option_name[$row],
            ];
            $relatedProduct = RelatedProduct::create($relatedProduct);
        }
        return redirect()->back()->with('success', 'RelatedProduct has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\RelatedProduct $relatedProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RelatedProduct::where('id',$id)->orWhere('parent_id',$id)->delete();
        return redirect()->back()->with('success', 'RelatedProduct Deleted Succesfully');
    }

//    public function SearchEdit(Request $request)
//    {
//        $product = Product::
//              leftJoin('media', 'products.id', '=', 'media.reference_id')
//            ->leftJoin('related_products', 'products.id', '=', 'related_products.product_id')
//            ->where('media.reference_type','=','product')
//            ->where('products.title', 'like',"%$request->search%")
//            ->select('products.id','products.title','products.status','media.image','related_products.id as related','related_products.parent_id','related_products.option_name')
//            ->get();
//        return response($product);
//    }

    public function SearchEdit(Request $request)
    {
        if($request->keyword  != '') {
            $product = Product::leftJoin('media', 'products.id', '=', 'media.reference_id')
                ->leftJoin('related_products', 'products.id', '=', 'related_products.product_id')
                ->where('media.reference_type', '=', 'product')
                ->where('products.title', 'like', '%'.$request->keyword.'%')
                ->select('products.id', 'products.title', 'products.status', 'media.image', 'related_products.id as related', 'related_products.parent_id', 'related_products.option_name')
                ->get();
            return response()->json([
                'product' => $product
            ]);
        }
    }
}
