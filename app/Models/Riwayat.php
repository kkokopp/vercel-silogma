<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    protected $guarded = ['riwayat_id'];
    use HasFactory;

    public function senjata()
    {
        return $this->belongsTo(Senjata::class);
    }
}
