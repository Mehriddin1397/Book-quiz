<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestCode extends Model
{
    use HasFactory;
    protected $fillable = ['code','is_used','user_id'];
}
