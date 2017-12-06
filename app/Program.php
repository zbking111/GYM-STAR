<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
	protected $table = "programs";
	public function training(){
		return $this->hasMany('App\Training','id_program','id');
	}

	public function practices(){
		return $this->hasMany('App\Practice','id_program','id');
	}
}
