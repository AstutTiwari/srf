<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('category_id')->nullable();
            $table->enum('rate',['1', '2','3','4','5'])->default('4');
            $table->string('metal_type')->nullable();
            $table->string('purity',50)->nullable();
            $table->string('seq_no',50)->nullable();
            $table->string('design_no',50)->nullable();
            $table->string('g_wt',50)->nullable();
            $table->string('n_wt',50)->nullable();
            $table->string('diamand_wt',50)->nullable();
            $table->string('diamand_pics',50)->nullable();
            $table->string('color_stone_wt',50)->nullable();
            $table->string('clarity',50)->nullable();
            $table->integer('color_id')->nullable();
            $table->string('quality',50)->nullable();
            $table->integer('shape_id')->nullable();
            $table->string('size',50)->nullable();
            $table->string('metal_rate',50)->nullable();
            $table->string('polish_charges',50)->nullable();
            $table->string('making_charges',50)->nullable();
            $table->string('metal_value',50)->nullable();
            $table->string('diamond_value',50)->nullable();
            $table->string('labour_value',50)->nullable();
            $table->string('diamond_handling_charge',50)->nullable();
            $table->string('total_value',50)->nullable();
            $table->string('discount_value',50)->nullable();
            $table->string('final_value',50)->nullable();
            $table->string('gst',50)->nullable();
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
        Schema::dropIfExists('product_infos');
    }
}
