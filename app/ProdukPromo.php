<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdukPromo extends Model
{
    protected $table = 'produk_promo';
    protected $fillable = [
        'produk_id',
        'harga_awal',
        'harga_akhir',
        'diskon_persen',
        'diskon_nominal',
        'user_id',
    ];

    public function produk() {
        return $this->belongsTo('App\Produk','produk_id');
    }

    public function user() {
        return $this->belongsTo('App\User','user_id');
    }
}
