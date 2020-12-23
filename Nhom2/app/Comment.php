<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    // public $timestamps = false;

    protected $table = 'coments';
    protected $primaryKey = 'com_id';
    protected $guarded = [];


    protected $fillable = [
        'com_id', 'com_name',
    ];
}
