<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimateField extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'type'
    ];

    // Un champ d'estimation peut contenir de 0 à une infinité de valeurs pré-définies
    public function presetValues()
    {
        return $this->hasMany(EstimatePresetValue::class);
    }
}
