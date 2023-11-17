<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    use HasFactory;
    protected $table = "recruiters";
    protected $fillable = [
        'document_type_id',
        'document_number',
        'names',
        'surnames'
    ];
    public function document_type(){
        return $this->belongsTo(Document_type::class, 'user_id', 'id');
    }
}
