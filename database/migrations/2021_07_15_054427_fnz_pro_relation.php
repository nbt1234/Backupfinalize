<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class fnzProRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(PRO_REL, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pro_id');
            $table->integer('cate_id');
            $table->integer('inventory_id');
            $table->integer('attr_id');
            $table->integer('attr_value_id');
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
    }
}
