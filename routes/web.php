<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BlogController;
// coupon
use App\Http\Controllers\Management\Coupon\StoreController;
use App\Http\Controllers\Management\Coupon\CouponController;
use App\Http\Controllers\Management\Coupon\VideoshowController;
//Ecommerce
use App\Http\Controllers\Management\Ecommerce\ProductController;
use App\Http\Controllers\Management\Ecommerce\DuplicateProductController;
//Ecommerce//RelatedProduct
use App\Http\Controllers\Management\Ecommerce\RelatedProductController;

use App\Http\Controllers\Management\LanguageController;
use App\Http\Controllers\Management\TagController;
use App\Http\Controllers\Management\CurrencyController;
use App\Http\Controllers\Management\KeywordController;
use App\Http\Controllers\Management\SizeChartController;
use App\Http\Controllers\Management\GalleryController;

use App\Http\Controllers\Management\MenuController;
use App\Http\Controllers\Management\VariationController;
use App\Http\Controllers\Management\BrandController;
use App\Http\Controllers\Management\ProductReviewsController;
use App\Http\Controllers\Management\ShippingMethodsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserinfoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::fallback(function () {

    return view("404");

});


Route::get('/clear', function (){

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');


    return redirect()->back();

});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('file', function () {
    return view('/file');
});

Route::post('upload',[App\Http\Controllers\Frontend\ReactionsController::class, 'document']);

Route::get('/', [App\Http\Controllers\Frontend\FrontHomeController::class, 'index']);

Route::get('SearchKeyword', [App\Http\Controllers\Frontend\FrontHomeController::class, 'SearchKeyword']);

Route::get('SearchKey', [App\Http\Controllers\CategoriesController::class, 'SearchKey']);
Route::post('ProductInCategory', [App\Http\Controllers\CategoriesController::class, 'ProductInCategory']);

//Route::get('Search', [App\Http\Controllers\Management\Ecommerce\ProductController::class, 'Search']);
//Route::get('SearchKi', [App\Http\Controllers\Management\Ecommerce\DuplicateProductController::class, 'SearchKi']);
Route::post('related-products', [App\Http\Controllers\Management\Ecommerce\RelatedProductController::class, 'SearchEdit'])->name('product.search');

Auth::routes();


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('admin/dashboard',HomeController::class);

    Route::resource('admin/countries',CountryController::class);


    //Categories
    Route::resource('admin/categories',CategoriesController::class);


    //blog
    Route::resource('admin/post',BlogController::class);

    //store
    Route::resource('admin/store',StoreController::class);

    //video
    Route::resource('admin/videos',VideoshowController::class);

    //slider
    Route::resource('admin/slider',SliderController::class);

    //testimonial
    Route::resource('admin/testimonial',App\Http\Controllers\Management\TestimonialController::class);

    //userinfo
    Route::resource('admin/user-info',UserinfoController::class);

    //pages
    Route::resource('admin/pages',PageController::class);

    Route::resource('admin/contacts',App\Http\Controllers\Management\ContactController::class);


    //coupon
    Route::resource('admin/coupon',CouponController::class);
    Route::resource('admin/discount-coupon',App\Http\Controllers\Management\CoupenDiscountController::class);
    Route::resource('admin/theme-setting', App\Http\Controllers\Management\ThemeSettingsController::class);
    Route::post('admin/theme-setting-fields', [App\Http\Controllers\Management\ThemeSettingsController::class,'theme_setting_fields']);

    //language

    Route::resource('admin/language', LanguageController::class);

    //currency
    Route::resource('admin/currency',CurrencyController::class);

    //keyword
    Route::resource('admin/keyword',KeywordController::class);

    //size_chart
        Route::resource('admin/size_chart',SizeChartController::class);

    //gallery
    Route::resource('admin/gallery',GalleryController::class);

    //tag
    Route::resource('admin/tag',TagController::class);


    //Variation
        Route::resource('admin/variation',VariationController::class);

    //Brand
    Route::resource('admin/brand',BrandController::class);

    //product_reviews
    Route::resource('admin/product_reviews',ProductReviewsController::class);

    //Shipping_Method
    Route::resource('admin/shipping_method',ShippingMethodsController::class);


    //products
    Route::resource('admin/products', ProductController::class);

    //duplicateProducts
    Route::resource('admin/duplicateProducts', DuplicateProductController::class);

    //related-products
    Route::resource('admin/related-products', RelatedProductController::class);

    //menu
    Route::resource('admin/menu', MenuController::class);

});


Route::get('testing', function () {
    return view('testing');
});

Route::post('testing-post',[App\Http\Controllers\Frontend\FrontHomeController::class, 'testing']);



Route::get('advertising', function () {
    return view('/frontend/contact/index');
});
Route::get('contact-us', function () {
    return view('/frontend/contact/index');
});
Route::get('/page/{slug}',[App\Http\Controllers\Frontend\FrontHomeController::class, 'PageShow']);

Route::get('/countrysort/{id}',[App\Http\Controllers\Frontend\FrontHomeController::class, 'countrysort']);
Route::get('/currencysort/{id}',[App\Http\Controllers\Frontend\FrontHomeController::class, 'currencysort']);
Route::get('/chalo',[App\Http\Controllers\Frontend\FrontHomeController::class, 'norm']);

//Route::get('collection/{slug}', function () {
//    return view('/frontend/coupon/collection');
//});
Route::get('deals', function () {
    return view('/frontend/coupon/deals');
});
Route::get('coupons', function () {
    return view('/frontend/coupon/coupons');
});
Route::get('stores/{slug}', function () {
    return view('/frontend/coupon/stores');
});


//Route::resource('single-coupons', App\Http\Controllers\Frontend\SingleCouponController::class);


Route::resource('blog', App\Http\Controllers\Frontend\BlogsController::class);
//Question-and-Answers
Route::resource('question', App\Http\Controllers\Frontend\QuestionAnswerController::class);

Route::post('post-like',[App\Http\Controllers\Frontend\ReactionsController::class, 'LikePost']);
Route::post('post-dislike',[App\Http\Controllers\Frontend\ReactionsController::class, 'DislikePost']);


Route::post('post-comment',[App\Http\Controllers\Frontend\ReactionsController::class, 'CommentPost']);

Route::get('search-result',[App\Http\Controllers\Frontend\FrontHomeController::class, 'SearchResult']);

Route::post('post-contact',[App\Http\Controllers\Frontend\FrontHomeController::class, 'ContactPost']);


Route::resource('my-account', App\Http\Controllers\Frontend\UserDashboardController::class);


Route::get('my-activity', [App\Http\Controllers\Frontend\UserDashboardController::class,'activity']);
Route::get('wishlist', [App\Http\Controllers\Frontend\UserDashboardController::class,'wishList']);


//my profile
Route::get('my-profile', [App\Http\Controllers\Frontend\UserDashboardController::class,'myProfile']);
Route::put('update_profile/{id}', [App\Http\Controllers\Frontend\UserDashboardController::class,'updateprofile']);

//change password

Route::get('change-password', [App\Http\Controllers\Frontend\UserDashboardController::class,'password']);
Route::put('update-password/{id}', [App\Http\Controllers\Frontend\UserDashboardController::class,'updatePassword']);

Route::resource('video', App\Http\Controllers\Frontend\VideoController::class);


Route::post('image-delete',[App\Http\Controllers\CouponController::class, 'imagedelete']);


Route::get('get-code/{id}', [App\Http\Controllers\Frontend\SingleCouponController::class, 'get_code']);
Route::post('newsletter',[App\Http\Controllers\Frontend\FrontHomeController::class, 'newsletter']);

//coupon search filter
Route::post('search-coupon', [CouponController::class,'search']);


// get size chart through ajax

Route::get('charts', [App\Http\Controllers\Management\SizeChartController::class,'chart']);


//single_product

Route::get('single-product/{slug}', [App\Http\Controllers\Frontend\FrontHomeController::class, 'singleProduct']);
Route::get('collection/{id}', [App\Http\Controllers\Frontend\FrontHomeController::class, 'collection']);


Route::get('cart', [App\Http\Controllers\Frontend\FrontHomeController::class, 'cart']);
Route::post('add-to-cart/{id}', [App\Http\Controllers\Frontend\FrontHomeController::class, 'addToCart']);
Route::patch('update-cart', [App\Http\Controllers\Frontend\FrontHomeController::class, 'updateCart']);
Route::delete('remove-from-cart', [App\Http\Controllers\Frontend\FrontHomeController::class, 'remove']);
Route::get('checkout', [App\Http\Controllers\Frontend\FrontHomeController::class, 'checkout']);
Route::post('order-complete', [App\Http\Controllers\Frontend\FrontHomeController::class, 'checkout_details']);
Route::get('my-order', [App\Http\Controllers\Frontend\DealsController::class, 'orderdetail']);
//Route::post('coupon_discount', [App\Http\Controllers\Frontend\DealsController::class, 'couponDiscount']);
Route::post('coupon_discount', [App\Http\Controllers\Frontend\FrontHomeController::class, 'couponDiscount']);
//Route::post('order-complete', [App\Http\Controllers\Frontend\FrontHomeController::class, 'couponDiscount']);


Route::post('vars-attribute', [App\Http\Controllers\Frontend\FrontHomeController::class, 'varsRate']);

//Route::get("check", function(){
//    return view("frontend/product/thankyou");
//});

//Route::get('my-order', [App\Http\Controllers\Frontend\FrontHomeController::class, 'orderdetail']);


// sitemap

Route::get('sitemap.xml',[App\Http\Controllers\Frontend\SitemapController::class, 'index']);
Route::get('coupon.xml', [App\Http\Controllers\Frontend\SitemapController::class, 'coupon']);
Route::get('deal.xml', [App\Http\Controllers\Frontend\SitemapController::class, 'deal']);
Route::get('post.xml', [App\Http\Controllers\Frontend\SitemapController::class, 'post']);
Route::get('pages.xml', [App\Http\Controllers\Frontend\SitemapController::class, 'pages']);
Route::get('video.xml', [App\Http\Controllers\Frontend\SitemapController::class, 'video']);
//Route::get('collection.xml', [App\Http\Controllers\Frontend\SitemapController::class, 'collection']);


Route::get('stripe', [\App\Http\Controllers\frontendController::class, 'stripe']);
Route::post('stripe', [\App\Http\Controllers\frontendController::class, 'stripePost'])->name('stripe.post');
Route::get('/gameonhai',[App\Http\Controllers\Frontend\PaymentGatewayController::class, 'gameonhai']);

