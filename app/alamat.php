<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\siswa;

class alamat extends Model
{
    protected $fillable=[
        'dusun','desa','kecamatan','kabupaten','provinsi','kode_pos'
    ];
    public function siswa(){
        return $this->belongsto(siswa::class);
    }
}
