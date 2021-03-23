<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Banner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url');
            $table->enum('order',['1', '2','3'])->default('1')->comment("1=>'first position', 1=>'second position','3'=>'third' ");
            $table->string('title');
            $table->string('sub_title');
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
       Schema::dropIfExists('banners');
    }
}
