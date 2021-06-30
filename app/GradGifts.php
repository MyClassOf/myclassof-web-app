<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradGifts extends Model
{
    protected $table = "grad_gifts";

    protected $fillable = [
        'user_id', 'price', 'title', 'image', 'description'
    ];
}