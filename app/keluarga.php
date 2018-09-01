<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class keluarga extends Model
{
    protected $fillable=[
        'nama','status','agama','pekerjaan','email','tlp','alamat'
    ];
    public function siswa(){
        return $this->belongsto(siswa::class);
    }
}
