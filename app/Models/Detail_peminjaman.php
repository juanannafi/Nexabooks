<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_peminjaman extends Model
{
    use HasFactory;

    protected $table = 'detail_peminjaman';
    protected $fillable = [
        'peminjaman_id',
        'buku_id'
    ];

    public function peminjaman(){
        return $this->hasMany(Peminjaman::class);
    }

    public function buku(){
        return $this->belongsTo(Buku::class);
    }
}
