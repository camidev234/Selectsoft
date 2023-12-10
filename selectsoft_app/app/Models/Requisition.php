<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    use HasFactory;

    protected $fillable = [
        'occupation_id',
        'description',
        'function',
        'denomination',
        'skills',
        'knowledge'
    ];

    // Definir la relación con la tabla 'occupations'
    public function occupation()
    {
        return $this->belongsTo(Occupation::class, 'occupation_id');
    }
}
