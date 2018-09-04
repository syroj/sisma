<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\status;
use App\alamat;
use App\asal_sekolah;
class siswa extends Model
{
    protected $fillable=[
        'nis','nisn','nik','no_kk','nama','tmp_lahir','tgl_lahir','anak_ke','jml_saudara','photo','agama','gender','status_id'
    ];
    public function alamat(){
        return $this->hasmany(alamat::class);
    }
    public function asal_sekolah(){
        return $this->hasone(asal_sekolah::class);
    }
    public function status(){
        return $this->belongsto(status::class);
    }
    public function keluarga(){
        return $this->hasmany(keluarga::class);
    }
}
