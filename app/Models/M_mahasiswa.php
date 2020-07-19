<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_mahasiswa extends Model
{
    protected $table = 'm_mahasiswa';
    protected $fillable = [
        'nim', 'nama', 'alamat', 'no_telp', 'photo'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
