<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    protected $table = 'kandidat';

    public function mhs_calon_ketua()
    {
        return $this->belongsTo('App\Models\M_mahasiswa', 'calon_ketua', 'id');
    }

    public function mhs_calon_wakil()
    {
        return $this->belongsTo('App\Models\M_mahasiswa', 'calon_wakil', 'id');
    }
}
