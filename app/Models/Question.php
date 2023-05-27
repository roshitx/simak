<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'index',
        'question',
        'type',
        'kuesioner_id',
    ];

    public function question()
    {
        return $this->belongsTo(Kuesioner::class);
    }

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }
}
