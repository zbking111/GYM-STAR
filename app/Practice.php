<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
	protected $table = "practice";
	public function programs(){
		return $this->belongsTo('App\Program','id_program','id');
	}

	public function users(){
		return $this->belongsTo('App\User','id_user','id');
	}
}
