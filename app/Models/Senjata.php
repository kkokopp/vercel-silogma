<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Senjata extends Model
{
    protected $guarded = ['id'];

    public function jenis_senjata()
    {
        return $this->belongsTo(JenisSenjata::class);
    }

    public function status_senjata()
    {
        return $this->belongsTo(StatusSenjata::class);
    }

    public function riwayat()
    {
        return $this->hasMany(Riwayat::class);
    }

    use HasFactory;
}
