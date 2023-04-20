<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class fnzRating extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fnz_rating', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rater_id');
            $table->integer('product_id');
            $table->integer('rating')->default(0);
            $table->text('comment')->default('');
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
