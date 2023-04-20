<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class fnzUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(USERS, function (Blueprint $table) {
            $table->increments('ID');
            $table->string('username')->default('');
            $table->string('first_name')->default('');
            $table->string('last_name')->default('');
            $table->string('email')->default('');
            $table->string('password')->default('');
            $table->string('dec_password')->default('');
            $table->string('mobile')->default('');
            $table->string('avatar')->default('');
            $table->string('google_id')->default('');
            $table->string('fb_id')->default('');
            $table->integer('role_status')->comment('1 = ADMIN , 2 = SUBADMIN , 3 = VENDOR, 4 = USER')->default(4);
            $table->string('forget_key')->default('');
            $table->dateTime('expire_forget_key')->useCurrentOnUpdate();
            $table->dateTime('resend_otp_time')->useCurrentOnUpdate();
            $table->integer('user_status')->comment('0 = ACTIVE , 1 = INACTIVE')->default(1);
            $table->integer('login_status')->comment('0 = ACTIVE , 1 = INACTIVE')->default(1);
            $table->integer('user_block_status')->comment('0 = ACTIVE , 1 = INACTIVE')->default(1);
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
