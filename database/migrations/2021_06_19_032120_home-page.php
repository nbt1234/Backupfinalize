<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HomePage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fnz_home_page', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('');
            $table->text('heading')->default('');
            $table->text('content')->default('');
            $table->string('image')->default('');
            $table->text('urls')->default('');
            $table->string('type')->default('');
            $table->string('page_name')->default('');
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
