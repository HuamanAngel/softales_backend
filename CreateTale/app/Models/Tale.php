<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tale extends Model
{
    use HasFactory;

    protected $fillable = [
        'tal_titl',
        'tal_desc',
        'tal_fron_img',
        'tal_cont',
        'col_id',
    ];    

}
