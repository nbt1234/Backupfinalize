<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Users extends Model
{
    protected $table = USERS;
    protected $primaryKey = 'ID';

    use HasFactory, HasApiTokens;

    public function admin_login_verify($data = '')
    {
        $users = DB::table(USERS)
            ->where('role_status', '<>', 3)
            ->where('role_status', '<>', 4)
            ->where('email', $data['email'])
            ->first();

        if (!empty($users)) {
            if (Hash::check($data['password'], $users->password)) {
                $session_array = array('madminId' => $users->ID,
                    'email' => $users->email,
                    'role' => $users->role_status,
                    'loggedIn' => true,
                );
                return $session_array;
            } else {
                return 'password';
            }
        } else {
            return 'email';
        }
    }

    public function forget_password($email = '', $key = '', $key_expire = '')
    {
        $data = DB::table(USERS)
            ->where('email', $email)
            ->first();
        if (!empty($data)) {

            $affected = DB::table(USERS)
                ->where('email', $email)
                ->update(['forget_key' => $key, 'expire_forget_key' => $key_expire]);

            return $affected ? array('forget_email' => $email) : 0;

        } else {
            return 'email';
        }
    }

    public function vendor_forget_password($email = '', $key = '', $key_expire = '')
    {
        $data = DB::table(VENDORS)
            ->where('email', $email)
            ->first();
        if (!empty($data)) {

            $affected = DB::table(VENDORS)
                ->where('email', $email)
                ->update(['forget_key' => $key, 'expire_forget_key' => $key_expire]);

            return $affected ? array('forget_email' => $email) : 0;

        } else {
            return 'email';
        }
    }

    public function vendor_login_verify($data = '')
    {
        $users = DB::table(VENDORS)
            ->where('role_status', 3)
            ->where('email', $data['email'])
            ->first();

        if (!empty($users)) {
            if (Hash::check($data['password'], $users->password)) {

                $session_array = array('mvenId' => $users->ven_id,
                    'ven_email' => $users->email,
                    'ven_role' => $users->role_status,
                    'ven_loggedIn' => true,
                );
                return $session_array;
            } else {
                return 'password';
            }
        } else {
            return 'email';
        }
    }
}
