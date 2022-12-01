<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends User
{
    use HasFactory;
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_code', 'code');
    }
}
