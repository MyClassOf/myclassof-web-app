<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountDetails extends Model
{
    protected $table = "acc_details";
    
    protected $fillable = [
        'user_id', 'paypal_email'
        ];

}
