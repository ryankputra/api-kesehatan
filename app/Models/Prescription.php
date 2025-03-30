<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'medical_record_id',
        'obat',
        'dosis',
    ];

    // Relasi dengan model MedicalRecord
    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
    }
}
