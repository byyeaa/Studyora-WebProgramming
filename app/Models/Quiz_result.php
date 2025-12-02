<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz_result extends Model
{
    protected $fillable = ['user_id', 'quiz_id', 'score'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
