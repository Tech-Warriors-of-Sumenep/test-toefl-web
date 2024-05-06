<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Jawaban extends Model
{
    use HasFactory;
    
    protected $guarded = [
        'id'
    ];

    // One To One
    public function kunciJawaban(): HasOne {
        return $this->hasOne(KunciJawaban::class);
    } 

    // One To Many
    public function record(): HasMany {
        return $this->hasMany(Record::class);
    }

    // Many To One
    public function soal(): BelongsTo {
        return $this->belongsTo(Soal::class);
    }
}
