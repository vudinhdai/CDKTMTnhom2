<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'cate_id';
    protected $guarded = [];


    protected $fillable = [
        'cate_id', 'cate_name',
    ];
}
