<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'col_titl',
        'col_bann',
        'col_desc',
        'col_cate',
        'col_fron_img',
        'user_id',
    ];    
}
