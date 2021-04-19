<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePopularProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popular_products', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->integer('category_id')->default('0');
            $table->string('banner_name')->nullable();
            $table->string('banner_path')->nullable();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->enum('status',['1', '0'])->default('1')->comment("0=>'Not show frontend', 1=>'show on frontend'");
            $table->integer('parent_id')->default('0');
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
        Schema::dropIfExists('popular_products');
    }
}
