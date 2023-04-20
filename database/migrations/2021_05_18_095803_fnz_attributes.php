<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class fnzAttributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(ATTR, function (Blueprint $table) {
            $table->increments('id');
            $table->string('attr_name')->default('');
            $table->string('attr_slug')->default('');
            $table->integer('category')->default(0);
            $table->biginteger('role')->comment('1=admin,3=vendor');
            $table->biginteger('adder_id');
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
