<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class fnzFaqs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(FAQ, function (Blueprint $table) {
         $table->increments('id');
         $table->integer('cate_id')->default(0);
         $table->text('heading')->default('');
         $table->text('content')->default('');
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
