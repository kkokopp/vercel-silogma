<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSenjata extends Model
{
    protected $guarded = ['id'];

    public function senjata()
    {
        return $this->hasMany(Senjata::class);
    }
    use HasFactory;
}
