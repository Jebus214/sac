<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    
    protected $fillable = ['nombre', 'apaterno', 'amaterno', 'area_id'];
	protected $table = 'autores';
	protected $appends = ['fullname'];

	 public function getFullnameAttribute() {

    	return $this->nombre.' '.$this->apaterno.' '.$this->amaterno;


	  }

    public function area() {
        return $this->belongsTo(Area::class);
    }

     public function documento() {
        return $this->hasMany(Autor::class);
    }
}
