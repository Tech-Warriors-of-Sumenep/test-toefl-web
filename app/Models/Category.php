<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    // One To Many
    public function materi(): HasMany {
        return $this->hasMany(Materi::class);
    }

    // One To Many
    public function ujian(): HasMany {
        return $this->hasMany(Ujian::class);
    }

}
