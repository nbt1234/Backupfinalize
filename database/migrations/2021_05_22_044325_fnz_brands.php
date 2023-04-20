<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class fnzBrands extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(BRAND, function (Blueprint $table) {
         $table->increments('id');
         $table->string('brand_name')->default('');
         $table->string('brand_slug')->default('');
         $table->string('logo')->default('');
         $table->integer('status')->comment('0 = ACTIVE , 1 = INACTIVE')->default(0);
         $table->dateTime('created_at')->useCurrent();
         $table->dateTime('updated_at')->useCurrentOnUpdate();
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
