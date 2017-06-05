<?php

use Illuminate\Database\Seeder;

class AutoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('autores')->insert([
    'nombre'=>'Juan',
    'apaterno'=>'Perez',
    'amaterno'=>'Valdez',
    
    'area_id'=>1,

        ]);



         DB::table('autores')->insert([
          'nombre'=>'Fulanito',
          'apaterno'=>'Rosado',
          'amaterno'=>'Decard',
          
          'area_id'=>2,

        ]);



    DB::table('autores')->insert([
      'nombre'=>'Super',
      'apaterno'=>'Mario',
      'amaterno'=>'Bross',
      
      'area_id'=>3,

        ]);

        DB::table('autores')->insert([
            'nombre'=>'Luis',
            'apaterno'=>'Diaz',
            'amaterno'=>'Perea',
            'area_id'=>4,
        ]);


    DB::table('autores')->insert([
      'nombre'=>'Erika',
      'apaterno'=>'Del',
      'amaterno'=>'Mazo',
      'area_id'=>5,
        ]);
    }
}
