<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subject_id',
        'phone',
        'email',
        'address',
    ];


    // protected $with = ['subject'];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
