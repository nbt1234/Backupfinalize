<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class fnzTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(TAGS, function (Blueprint $table) {
         $table->increments('id');
         $table->string('tag_name')->default('');
         $table->string('tag_slug')->default('');
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
