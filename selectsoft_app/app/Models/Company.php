<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    public function selectors() :HasMany {
        return $this->hasMany(Selector::class);
    }

    public function recruiters() :HasMany {
        return $this->hasMany(Recruiter::class);
    }
}
