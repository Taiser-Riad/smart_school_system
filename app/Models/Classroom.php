<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use carbon\Carbon;

class Classroom extends Model
{
    use HasFactory;

    protected $dates = ['start_time', 'end_time'];
    public function isActive()
    {
        $now = Carbon::now();
        return $now->between($this->start_time, $this->end_time);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }
}
