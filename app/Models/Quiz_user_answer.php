<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz_user_answer extends Model
{
    protected $fillable = ['quiz_result_id', 'question_id', 'option_id', 'is_correct'];
}
