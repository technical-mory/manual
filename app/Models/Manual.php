<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manual extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function step() {
        return $this->hasMany(Step::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleted(function ($manual) {
            $manual->step()->delete();
        });
    }
}
