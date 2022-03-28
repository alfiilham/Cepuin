<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $fillable=[
        'categori_id','nik','tgl_pengaduan','isi_laporan','foto','like','dislike'
    ];

    public function dataCategori(){
        return $this->hasOne(Categories::class, 'id', 'categori_id');
    }
}
