<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $photo
 */
class Question extends Model
{
    use HasFactory;

    protected $fillable = ['quiz_id', 'question', 'a', 'b', 'c', 'd', 'ans','photo'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
