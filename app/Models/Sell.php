<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;

    protected $fillable = [
        'prescription_id',
        'market_id',
        'jumlah',
        'total_harga',
    ];

    // Relasi dengan prescription
    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }

    // Relasi dengan market
    public function market()
    {
        return $this->belongsTo(Market::class);
    }
}
