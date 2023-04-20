<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cate_model extends Model
{
    use HasFactory;
    protected $table = CATE;

    public function setCateNameAttribute($value)
	{
        $this->attributes['cate_name'] = ucfirst($value);
	}

}
