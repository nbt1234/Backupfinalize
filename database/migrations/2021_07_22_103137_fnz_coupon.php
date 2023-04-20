<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class fnzCoupon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fnz_coupon', function (Blueprint $table) {
            $table->increments('id');
            $table->string('coupon_code')->default('');
            $table->string('coupon_name')->default('');
            $table->integer('adder_id')->default(0);
            $table->text('products')->default('{}');
            $table->integer('discount')->default(0);
            $table->integer('limit_count')->default(0);
            $table->integer('no_of_user')->default(0);
            $table->integer('dis_type')->comment('0 = FLAT , 1 = PERCENTAGE')->default(0);
            $table->dateTime('start_date')->default(null);
            $table->dateTime('end_date')->default(null);
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
