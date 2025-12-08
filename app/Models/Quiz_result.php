<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz_result extends Model
{
    protected $table = 'quiz_results'; 

    protected $fillable = ['user_id', 'quiz_id', 'score'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Quiz_user_answer::class, 'quiz_result_id');
    }
}
