<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $fillable = ['name', 'age', 'gender', 'report_teacher', 'created_at', 'updated_at	'];
}

