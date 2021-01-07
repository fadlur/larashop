<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlamatPengiriman extends Model
{
    protected $table = 'alamat_pengiriman';
    protected $fillable = [
        'user_id',
        'status',
        'nama_penerima',
        'no_tlp',
        'alamat',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'kodepos',
    ];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
