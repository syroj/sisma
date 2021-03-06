<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\siswa;

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
    public function staf(){
    	return $this->hasone(staf::class);
    }
}
