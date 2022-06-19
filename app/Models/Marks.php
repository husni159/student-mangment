<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    protected $table = 'marks';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $fillable = ['std_id', 'maths', 'science', 'history', 'term', 'total', 'created_at', 'updated_at'];
}
