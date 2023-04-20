<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vendors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(VENDORS, function (Blueprint $table) {
            $table->increments('ven_id');
            $table->string('ven_slug')->default('');
            $table->string('username')->default('');
            $table->string('name')->default('');
            $table->string('email')->default('');
            $table->string('password')->default('');
            $table->string('dec_password')->default('');
            $table->string('mobile')->default('');            
            $table->string('avatar')->default('');
            $table->text('bio')->default('');
            $table->string('login_type')->comment('email, google, fb')->default('email');
            $table->string('google_id')->default('');
            $table->string('fb_id')->default('');
            $table->integer('role_status')->comment('1 = ADMIN , 2 = SUBADMIN , 3 = VENDOR, 4 = USER')->default(3);
            $table->string('forget_key')->default('');
            $table->dateTime('expire_forget_key')->useCurrentOnUpdate();
            $table->integer('vendor_status')->comment('0 = ACTIVE , 1 = INACTIVE')->default(1);
            $table->integer('login_status')->comment('0 = ACTIVE , 1 = INACTIVE')->default(1);
            $table->integer('vendor_block_status')->comment('0 = ACTIVE , 1 = INACTIVE')->default(1);
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
