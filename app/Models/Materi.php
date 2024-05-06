<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Materi extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    // Many To One
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
