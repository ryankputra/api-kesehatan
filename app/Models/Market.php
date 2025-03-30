<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'lokasi',
    ];

    // Relasi dengan sells
    public function sells()
    {
        return $this->hasMany(Sell::class);
    }
}
