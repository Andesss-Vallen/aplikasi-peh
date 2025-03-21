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
        'keterangan', 'pakaian', 'id_cs', 'timfoto_id', 'timvideo_id', 'id_paket'
    ];
    public $timestamps = false;

    public function customerService()
    {
        return $this->belongsTo(CustomerService::class, 'id_cs');
    }

    public function timFoto()
    {
        return $this->belongsToMany(TimFoto::class, 'jadwal_timfoto', 'jadwal_id', 'timfoto_id');
    }
    public function timVideo()
    {
        return $this->belongsToMany(TimVideo::class, 'jadwal_timvideo', 'jadwal_id', 'timvideo_id');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }

    public function detailJadwal()
    {
        return $this->hasOne(DetailJadwal::class, 'id_jadwal');
    }
}
