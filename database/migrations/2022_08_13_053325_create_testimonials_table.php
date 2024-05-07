<?php
//
//use Illuminate\Database\Migrations\Migration;
//use Illuminate\Database\Schema\Blueprint;
//use Illuminate\Support\Facades\Schema;
//
//class CreateNewslettersTable extends Migration
//{
//    /**
//     * Run the migrations.
//     *
//     * @return void
//     */
//    public function up()
//    {
//        Schema::create('testimonials', function (Blueprint $table) {
//            $table->increments('id')->unsigned();
//            $table->string('name')->unique();
//            $table->string('designation')->nullable();
//            $table->string('comment')->nullable();
//            $table->string('profile')->nullable();
//            $table->string('status')->nullable();
//            $table->string('orderby')->nullable();
//            $table->timestamps();
//        });
//    }
//
//    /**
//     * Reverse the migrations.
//     *
//     * @return void
//     */
//    public function down()
//    {
//        Schema::dropIfExists('newsletters');
//    }
//}
