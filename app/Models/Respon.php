<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respon extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kuesioner()
    {
        return $this->belongsTo(Kuesioner::class);
    }
}
