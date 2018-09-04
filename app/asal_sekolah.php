<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\siswa;
class asal_sekolah extends Model
{
    protected $fillable=[
        'asal_sekolah','dusun','desa','kecamatan','kabupaten','provinsi','kode_pos'
    ];
    public function siswa(){
        return $this->belongsto(siswa::class);
    }
}
