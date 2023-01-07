<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Flight extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function depairport(): BelongsTo
    {
        return $this->belongsTo(Airport::class, 'depairport');
    }

    public function arrairport(): BelongsTo
    {
        return $this->belongsTo(Airport::class, 'arrairport');
    }

}
