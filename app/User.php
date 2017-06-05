<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email', 'area_id','dependencia_id', 'status', 'permisos', 'password'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $appends =['arear'];


    public function getArearAttribute() {
      if($this->area!=null)
        return $this->area;
    }



    public function area()
    {
        return $this->belongsTo(Area::class);
    }


        public function dependencia()
    {
        return $this->belongsTo(Dependencia::class);
    }

     public function oficio() 
     {
        return $this->hasMany(Oficio::class);
    }



}   