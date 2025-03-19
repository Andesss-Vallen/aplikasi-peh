<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerService extends Model
{
    use HasFactory;

    protected $table = 'customer_services';
    protected $fillable = ['nama', 'nomor_hp', 'status'];
    public $timestamps = false;

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_cs');
    }
}
