<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
	public $timestamps = false;
    protected $table = 'cart';
    protected $primaryKey = 'cart_id';
    protected $guarded = [];

    protected $fillable = [
        'cart_id', 'card_user_id',
    ];

}
