<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asal_sekolah extends Model
{
    protected $fillable=[
        'nama_sekolah','dusun','desa','kecamatan','kabupaten','provinsi','kode_pos'
    ];
    public function siswa(){
        return $this->belongsto(siswa::class);
    }
}
