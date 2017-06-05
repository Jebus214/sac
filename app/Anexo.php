<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anexo extends Model
{
        protected $fillable = ['oficio_id','archivo'];


        public function oficios() {
        	return $this->belongsToMany(Oficio::class);
    	}

}
