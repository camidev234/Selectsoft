<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document_type extends Model
{
    use HasFactory;
    protected $table = "recruiters";
    protected $fillable = [
        'document_type'
    ];
    public function recruiters(){
        return $this->hasMany(Recruiter::class, 'document_type_id', 'id');
    }
}
