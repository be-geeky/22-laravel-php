<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exp extends Model
{
    protected $fillable = ['name','id_exp', 'about', 'ville', 'name_owner', 'adress', 'surface', 'price', 'rooms', 'parking', 'lift', 'level', 'availability', 'electricity', 'class_nrj', 'class_gaz', 'photo', 'video', 'option', 'online', 'delete', 'time_del'];

    public function images() {
    	return $this->hasMany('App\Image');
    }

}
