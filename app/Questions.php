<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table = "questions";

    function Answers()
    {
        return $this->hasOne('App\AnsweredQuestions', 'id', 'question_id');
    }
}
