<?php

namespace App\Models;

use DateTime;
use DateTimeZone;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Flight extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function calculateTime(string $time, string $currentTimeZone, string $newTimeZone): string
    {
        $depOldTime = $time;
        $dTime = new DateTime($depOldTime, new DateTimeZone($currentTimeZone));
        $dTime->setTimezone(new DateTimeZone($newTimeZone));
        $newTime = $dTime->format('Y-m-d H:i:s');

        return $newTime;
    }

    public function departureAirport(): BelongsTo
    {
        return $this->belongsTo(Airport::class, 'depairport');
    }

    public function arrivalAirport(): BelongsTo
    {
        return $this->belongsTo(Airport::class, 'arrairport');
    }
}
