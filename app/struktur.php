<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\staf;
class struktur extends Model
{
 protected $fillable=[
     'posisi','deskripsi'
 ];
 public function user_model()
 {
     return $this->belongsToMany(User_model::class);
 }   
}
