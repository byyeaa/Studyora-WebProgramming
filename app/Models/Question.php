<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['quiz_id', 'question_text'];

    public function options()
    {
        return $this->hasMany(Option::class, 'question_id');
    }

    public function correctOption()
    {
        return $this->hasOne(Option::class, 'question_id')->where('is_correct', 1);
    }
}
