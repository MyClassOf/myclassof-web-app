<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterestedUser extends Model
{
    protected $table = "interested";
    
    protected $fillable = [
        'first_name', 'last_name', 'email'
        ];
}