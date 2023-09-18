<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimatePresetValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'value',
        'time',
        'startup_time',
        'total_percentage',
        'estimate_field_id',
    ];

    // Une valeur pré-définie appartient à un et un seul champ d'estimation
    public function field()
    {
        return $this->belongsTo(EstimateField::class);
    }
}
