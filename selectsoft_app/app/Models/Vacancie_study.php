<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancie_study extends Model
{
    use HasFactory;

    protected $fillable = [
        'study_level_id',
        'vacancie_id',
        'study_status_id',
        'study_name',
        'points',
    ];

    public function studyLevel()
    {
        return $this->belongsTo(study_level::class, 'study_level_id');
    }

    public function studyStatus()
    {
        return $this->belongsTo(study_status::class, 'study_status_id');
    }

    public function vacancie()
    {
        return $this->belongsTo(Vacancie::class, 'vacancie_id');
    }
}
