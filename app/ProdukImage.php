<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdukImage extends Model
{
    protected $fillable = [
        'produk_id',
        'foto',
    ];

    public function produk() {
        return $this->belongsTo('App\Produk','produk_id');
    }
}
