<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\tahun_ajaran;

class kurikulum extends Model
{
	protected $fillable=['nama','status'];

	public function tahun_ajaran(){
		return $this->hasmany(tahun_ajaran::class);
	}
}
