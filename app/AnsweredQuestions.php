<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnsweredQuestions extends Model
{
    protected $table = "user_answered";

    protected $fillable = [
        'user_id', 'question_id', 'deatiled_answer', 'answer', 'created_at', 'updated_at'
    ];

    function Questions()
    {
        return $this->hasOne('App\Questions', 'id', 'question_id');
    }
}
