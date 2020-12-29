<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $guarded = [];
    protected $fillable = [
        'order_id', 
    ];
}
