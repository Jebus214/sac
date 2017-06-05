<?php

use Illuminate\Database\Seeder;

class PersonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
       

  DB::table('personas')->insert([
  	'nombre'=>'Juan',
  	'apaterno'=>'Perez',
  	'amaterno'=>'Valdez',
  	'cargo'=>'',
  	'area_id'=>1,

        ]);



    	   DB::table('personas')->insert([
    	   	'nombre'=>'Alberto',
    	   	'apaterno'=>'Rodriguez',
    	   	'amaterno'=>'Huerta',
    	   	'cargo'=>'',
      		'area_id'=>2,

        ]);



    DB::table('personas')->insert([
    	'nombre'=>'Carlos',
    	'apaterno'=>'Ramirez',
    	'amaterno'=>'Perez',
    	'cargo'=>'',
    	'area_id'=>3,

        ]);

        DB::table('personas')->insert([
           	'nombre'=>'Luis',
           	'apaterno'=>'Diaz',
           	'amaterno'=>'Perea',
           	'cargo'=>'Director de TI',
           	'area_id'=>4,
        ]);


  	DB::table('personas')->insert([
  		'nombre'=>'Erika',
  		'apaterno'=>'Del',
  		'amaterno'=>'Mazo',
  		'cargo'=>'Directora de Administración',
  		'area_id'=>5,
        ]);

    	     
    }
}
