<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends User
{
    use HasFactory;
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'course_code', 'sub_1');
    }
}
