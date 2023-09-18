<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimateLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'type',
        'time',
        'estimate_id'
    ];

    // Un développement appartient à une et une seule estimation
    public function estimate()
    {
        return $this->belongsTo(Estimate::class);
    }
}
