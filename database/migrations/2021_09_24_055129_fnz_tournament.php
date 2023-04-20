<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FnzTournament extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fnz_tournament', function (Blueprint $table) {
         $table->increments('id');
         $table->string('tournament_id')->default('');
         $table->string('tournament_name')->default('');
         $table->string('tournament_date')->default('');
         $table->string('tournament_time')->default('');
         $table->string('registration_start_date')->default('');
         $table->string('registration_end_date')->default('');
         $table->string('players')->default('');
         $table->string('amount')->default('');
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
