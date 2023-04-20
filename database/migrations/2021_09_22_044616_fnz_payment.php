<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FnzPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fnz_payment', function (Blueprint $table) {
         $table->increments('id');
         $table->string('name')->default('');
         $table->string('amount');
         $table->string('payment_id')->default('');
         $table->string('razarpay_id')->default('');
         $table->string('payment_done')->default('');
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
