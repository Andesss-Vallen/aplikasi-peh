<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailJadwal extends Model
{
    use HasFactory;

    protected $table = 'detail_jadwals';
    protected $fillable = [
        'album',
        'medsos',
        'jam_ready',
        'rundown_text',
        'rundown_pdf',
        'keterangan',
        'id_jadwal'
    ];
    public $timestamps = false;

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }
}
