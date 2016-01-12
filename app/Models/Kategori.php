<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    //
    protected $table="kategori";

    public function kberita(){
    	return $this->hasMany('App\Models\Kberita','kategori_id');
    }

    public function berita(){
    	return $this->hasOne('App\Models\Berita','kategori_id');
    }
}
