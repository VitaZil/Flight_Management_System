<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Airport extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($builder, string|null $filter): Builder
    {
        if ($filter ?? false) {
            $builder->where('name', 'like', '%' . ucwords($filter) . '%')
                ->orWhere('iso_country', 'like', '%' . strtoupper($filter) . '%')
                ->orWhere('iso_region', 'like', '%' . strtoupper($filter) . '%')
                ->orWhere('municipality', 'like', '%' . ucwords($filter) . '%');
        }
        return $builder;
    }

    public function flight(): HasMany
    {
        return $this->hasMany(Flight::class);
    }
}
