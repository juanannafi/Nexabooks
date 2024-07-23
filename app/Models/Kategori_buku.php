<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori_buku extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kategori_bukus';
    protected $guarded = ['id'];


    public function bukus()
    {
        return $this->belongsTo(Buku::class, 'bukus_id');
    }
}
