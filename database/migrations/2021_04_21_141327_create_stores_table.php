<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->float('total_visitor_count');
            $table->float('unique_visitor_count');
            $table->string('email_count');
            $table->string('total_product_click_count');
            $table->string('feedback_rating_1');
            $table->string('feedback_rating_2');
            $table->string('feedback_rating_3');
            $table->string('feedback_rating_4');
            $table->string('feedback_rating_5');
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
        Schema::dropIfExists('stores');
    }
}
