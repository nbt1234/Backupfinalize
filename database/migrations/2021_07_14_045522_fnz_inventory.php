<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class fnzInventory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(INVEN, function (Blueprint $table) {

            $table->increments('id');
            $table->integer('pro_id');
            $table->text('inventory')->default('');
            $table->integer('inventory_id');
            $table->string('mrp')->default('');
            $table->string('sell_price')->default('');
            $table->integer('stocks')->default(0);
            $table->integer('avail_status')->comment('0 = ACTIVE , 1 = INACTIVE')->default(0);
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
