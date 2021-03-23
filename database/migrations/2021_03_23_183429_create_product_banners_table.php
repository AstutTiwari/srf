<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_banners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url');
            $table->string('slug')->unique();
            $table->enum('order',['1', '2','3','4','5','6'])->default('1');
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->enum('status',['1', '0'])->default('1')->comment("0=>'Not show frontend', 1=>'show on frontend'");
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
        Schema::dropIfExists('product_banners');
    }
}
