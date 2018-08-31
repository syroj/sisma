<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $fillable=[
        'nis','nisn','nik','no_kk','nama','tmp_lahir','tgl_lahir','anak_ke','jml_saudara','photo'
    ];
    public function alamat(){
        return $this->hasmany(alamat::class);
    }
    public function asal_sekolah(){
        return $this->hasmany(asal_sekolah::class);
    }
    public function status(){
        return $this->belongsto(status::class);
    }
}
