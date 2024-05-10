<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    // One To One
    public function materi(): HasOne {
        return $this->hasOne(Materi::class);
    }

    // One To One
    public function ujian(): HasOne {
        return $this->hasOne(Ujian::class);
    }

}
