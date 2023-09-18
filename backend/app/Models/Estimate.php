<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'total_time'
    ];

    // Une estimation peut contenir de 0 à une infinité de développement
    public function lines()
    {
        return $this->hasMany(EstimateLine::class);
    }
}
