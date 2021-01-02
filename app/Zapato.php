<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zapato extends Model
{
    protected $fillable = [
        'name_shoes', 'size_shoes', 'price_shoes',
    ];
}
