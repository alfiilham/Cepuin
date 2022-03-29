<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','nama_petugas','telp'
    ];

    public function dataUser(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
