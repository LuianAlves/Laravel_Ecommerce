<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVotesToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Products', function (Blueprint $table) {
            $table->integer('brand_id')->nullable()->change();
            $table->integer('sub_subcategory_id')->nullable()->change();
            $table->string('product_color_en')->nullable()->change();
            $table->string('product_color_pt')->nullable()->change();
            $table->string('discount_price')->nullable()->change();   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
