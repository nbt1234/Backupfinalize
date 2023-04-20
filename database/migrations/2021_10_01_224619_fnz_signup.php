<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FnzSignup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fnz_signup', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('otp')->default(0);
         $table->string('name')->default('');
         $table->string('email')->default('');
         $table->string('address')->default('');
         $table->string('password')->default('');
         $table->string('players_id')->default('');
         $table->string('phone')->default('');
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
