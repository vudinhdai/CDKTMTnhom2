<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderitems extends Model
{
    protected $table = 'orderitems';
    protected $primaryKey = 'orderitem_id';
    protected $guarded = [];
    protected $fillable = [
        'orderitem_id', 
    ];
}
