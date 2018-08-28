<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\kurikulum;
use App\status;

class tahun_ajaran extends Model
{
    protected $fillable=['nama','tgl_mulai','tgl_selesai','kurikulum_id','status'];
    
    public function kurikulum(){
    	return $this->belongsto(kurikulum::class);
    }
    public function status(){
    	return $this->belongsto(status::class);
    }
}
