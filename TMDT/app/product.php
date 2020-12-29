<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'prod_id';
    protected $guarded = [];
    protected $fillable = [
        'prod_id', 'prod_name',
    ];
}
