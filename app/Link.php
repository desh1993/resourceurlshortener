<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'links';
    protected $primary_key = 'id';

    protected $fillable = [
        'url' , 
        'short'
    ];
}
