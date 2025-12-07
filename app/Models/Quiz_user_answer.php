<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz_user_answer extends Model
{
    protected $fillable = ['quiz_result_id', 'question_id', 'option_id', 'is_correct'];

    public function result()
    {
        return $this->belongsTo(Quiz_result::class, 'quiz_result_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function option()
    {
        return $this->belongsTo(Option::class, 'option_id');
    }
}
