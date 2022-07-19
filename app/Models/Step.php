<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
        'image',
        'manual_id',
        'id',
    ];

    public function manual() {
        return $this->belongsTo(Manual::class);
    }
}
