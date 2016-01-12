<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model{
	protected $table="berita";

	public function kategori(){
		return $this->belongsTo('App\Models\Kategori','kategori_id');
	}

	public function kberita(){
		return $this->hasMany('App\Models\Kberita','berita_id');
	}
}