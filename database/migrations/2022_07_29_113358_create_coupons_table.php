<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('user_id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('affiliate_url')->nullable();
            $table->string('country_id')->nullable();
            $table->string('category_id')->nullable();
            $table->longText('image')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->string('status')->nullable();
            $table->integer('store_id')->nullable();
            $table->string('start_date')->nullable();
            $table->string('expiry_date')->nullable();
            $table->string('coupon_graph')->nullable();
            $table->string('fullfilled')->nullable();
            $table->string('coupon_type')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('discount')->nullable();
            $table->string('regular_price')->nullable();
            $table->string('compare_price')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
