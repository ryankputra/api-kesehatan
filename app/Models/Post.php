<?php

namespace App\Models;

use Illuninate\Database\Eloquent\Casts\Attributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    //ini untuk memberikan akses create, update
    protected $fillable = [
        'pic',
        'nama',
        'keterangan',
    ];

    //izin upload gambar / file
    protected function image() : Attribute
    {
        return Attributes::make(
            get: fn ($pic) => url("/storage/posts'. 'pic"),
        );
    }
}
