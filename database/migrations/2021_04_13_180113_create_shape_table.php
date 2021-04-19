<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShapeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shapes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
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
        Schema::dropIfExists('shape');
    }
}
