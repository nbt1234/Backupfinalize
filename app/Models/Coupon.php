<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = COUPON;

    use HasFactory;

    protected $fillable = ['coupon_code', 'coupon_name', 'adder_id', 'products', 'discount', 'limit_count', 'no_of_user', 'dis_type', 'start_date', 'end_date', 'status'];

    public function setCouponCodeAttribute($value)
    {
        $this->attributes['coupon_code'] = strtoupper($value);
    }
}
