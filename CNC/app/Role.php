<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

	//protected $table = 'my_flights'; //Custom Table Name
	//protected $primaryKey = 'role_id';
    public function users(){
        return $this->hasMany('App\Role');
    }
}
