<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwals';
    protected $fillable = [
        'client', 'brand', 'tanggal', 'bvia_foto', 'bvia_video', 
        'keterangan', 'pakaian', 'id_cs', 'id_tfoto', 'id_tvideo', 'id_paket'
    ];
    public $timestamps = false;

    public function customerService()
    {
        return $this->belongsTo(CustomerService::class, 'id_cs');
    }

    public function timFoto()
    {
        return $this->belongsTo(TimFoto::class, 'id_tfoto');
    }

    public function timVideo()
    {
        return $this->belongsTo(TimVideo::class, 'id_tvideo');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }

    public function detailJadwal()
    {
        return $this->hasMany(DetailJadwal::class, 'id_jadwal');
    }
}
