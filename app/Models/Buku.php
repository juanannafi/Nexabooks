<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buku extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'bukus';
    protected $guarded = [];

    public function kategori_bukus(){
        return $this->belongsTo(Kategori_buku::class, 'kategori_bukus_id');
    }

    public function buku(){
        return $this->hasMany(Detail_peminjaman::class);
    }
}
