<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_code', 'code');
    }
}
