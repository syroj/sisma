<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\staf;
use App\User;
class struktur extends Model
{
 protected $fillable=[
     'posisi','deskripsi'
 ];
 public function user()
 {
     return $this->belongsToMany(User::class);
 }   
}
