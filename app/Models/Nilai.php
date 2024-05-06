<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nilai extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    // Many To One
    public function ujian(): BelongsTo {
        return $this->belongsTo(Ujian::class);
    }

    // Many To One
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
