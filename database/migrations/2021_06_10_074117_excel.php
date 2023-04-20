<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Excel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fnz_excel', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendor_id');
            $table->string('cate_id')->default('');
            $table->string('subcate_ids')->default('');
            $table->integer('brand_id');
            $table->string('pro_name')->default('');
            $table->string('pro_slug')->default('');
            $table->text('short_desc')->default('');
            $table->text('description')->default('');
            $table->string('mrp')->default('');
            $table->string('sell_price')->default('');
            $table->string('SKU')->comment('Barcode')->default('');
            $table->string('tags')->default('');
            $table->string('weight')->comment('(KG)')->default('');
            $table->string('dimensions')->comment('(CM)')->default('');
            $table->string('country')->default('');
            $table->string('latitude')->default('');
            $table->string('longitude')->default('');
            $table->text('main_image')->default('');
            $table->text('gallery')->default('');
            $table->text('pro_video')->default('');
            $table->integer('product_type')->comment('0 = Simple , 1 = Variable')->default(0);
            $table->text('meta_title')->default('');
            $table->text('meta_description')->default('');
            $table->integer('views')->default(0);
            $table->integer('status')->comment('0 = ACTIVE , 1 = INACTIVE')->default(0);
            $table->text('inventory')->default('');
            $table->integer('inventory_id');
            // $table->string('mrp')->default('');
            // $table->string('sell_price')->default('');
            $table->integer('stocks')->default(0);
            $table->integer('avail_status')->comment('0 = ACTIVE , 1 = INACTIVE')->default(0);
            $table->integer('cat_id');
            $table->integer('attr_id');
            $table->integer('variant_id');
            $table->integer('attr_val_id');
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
