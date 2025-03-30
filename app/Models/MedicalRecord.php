<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'diagnosis',
        'treatment',
        'tanggal',
    ];

    // Relasi dengan model Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
