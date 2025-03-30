<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'password',
    ];

    // Relasi dengan janji temu
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
