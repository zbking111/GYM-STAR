<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
	protected $table = "training";
	public function program(){
		return $this->belongsTo('App\Program','id_program','id');
	}

	public function user(){
		return $this->belongsTo('App\User','id_user','id');
	}
}
