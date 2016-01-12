<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kberita extends Model{
	protected $table="kategori_berita";

	public function berita(){
		return $this->belongsTo('App\Models\Berita','berita_id');		
	}

	public function kategori(){
		return $this->belongsTo('App\Models\Kategori','kategori_id');
	}
}