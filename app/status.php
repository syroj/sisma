<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    protected $fillable=[
    	'kode_status','status'
    ];
    public function tahun_ajaran(){
    	return $this->hasmany(tahun_ajaran::class);
    }
    public function siswa(){
        return $this->hasmany(siswa::class);
    }
}
