<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DefaultGradGifts extends Model
{
    protected $table = "default_grad_gifts";

    protected $fillable = [
        'price', 'title', 'image', 'description'
    ];
}