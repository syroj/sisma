<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class staf extends Model
{
    protected $fillable=[
        'nama','nip','gender','tmp_lahir','tgl_lahir','alamat','pendidikan','almamater','photo'
    ];
}
