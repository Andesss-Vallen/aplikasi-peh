<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimFoto extends Model
{
    use HasFactory;

    protected $table = 'tim_fotos';
    protected $fillable = ['nama', 'nomor_hp', 'status'];
    public $timestamps = false;

    public function jadwal()
    {
        return $this->belongsToMany(Jadwal::class,'jadwal_timfoto', 'jadwal_id', 'timfoto_id');
    }
}
