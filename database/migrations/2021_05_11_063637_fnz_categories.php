<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class fnzCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(CATE, function (Blueprint $table) {
            $table->increments('cat_id');
            $table->string('cate_name')->default('');
            $table->string('slug')->default('');
            $table->string('table_slug')->default('');
            $table->text('description')->default('');
            $table->text('cate_img')->default('');
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
