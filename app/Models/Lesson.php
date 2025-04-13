<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

}
