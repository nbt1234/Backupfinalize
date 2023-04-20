<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FnzAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fnz_account', function (Blueprint $table) {
            $table->increments('id');
            $table->string('heading')->default('');
            $table->string('cash_blance')->default('');
            $table->string('credit_price')->default('');
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
