<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'job',
        'address',
        'phone',
        'email',
        'gender',
    ];

    // Relasi: 1 Guardian → Banyak Student
    public function students()
    {
        return $this->hasMany(Student::class, 'guardian_id');
    }
}
