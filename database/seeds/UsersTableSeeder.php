<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

DB::table('users')->insert(['name' =>'PEREZ MEDINA MARTIN','email' => 'martin.perez@izcalli.gob.mx','dependencia_id'=>14,'area_id'=>42,'password' => bcrypt('perez.2016'),]);
DB::table('users')->insert(['name' =>'VALDEZ ALVAREZ ELIZABETH','email' => 'elizabeth.valdez@izcalli.gob.mx','dependencia_id'=>14,'area_id'=>41,'password' => bcrypt('valdez.2017'),]);
DB::table('users')->insert(['name' =>'CUELLAR ESCOTO GUADALUPE','email' => 'guadalupe.cuellar@izcalli.gob.mx','dependencia_id'=>14,'area_id'=>40,'password' => bcrypt('cuellar.2017'),]);
DB::table('users')->insert(['name' =>'Gloria Cristina Báez Rodríguez','email' => 'cristina.baez@izcalli.gob.mx','dependencia_id'=>14,'area_id'=>39,'password' => bcrypt('baez.2017'),]);

		
DB::table('users')->insert(['name' =>'Iván de Guadalupe García Díaz','email' => 'ivan.guadalupe.garcia@izcalli.gob.mx','dependencia_id'=>14,'area_id'=>0,'password' => bcrypt('garcia.2017'),]);	
DB::table('users')->insert(['name' =>'Rubén Reyes Madero','email' => 'ruben.reyes@izcalli.gob.mx','dependencia_id'=>17,'area_id'=>0,'password' => bcrypt('reyes.2017'),]);	
DB::table('users')->insert(['name' =>'Juan Carlos Zavaleta Sánchez','email' => 'juan.carlos.zavaleta@izcalli.gob.mx','dependencia_id'=>19,'area_id'=>0,'password' => bcrypt('zavaleta.2017'),]);	
DB::table('users')->insert(['name' =>'Miguel Ángel García López','email' => 'miguel.angel.garcia@izcalli.gob.mx','dependencia_id'=>2,'area_id'=>0,'password' => bcrypt('garcia.2017'),]);	
DB::table('users')->insert(['name' =>'Loth Oswaldo Centeno Lara','email' => 'loth.oswaldo.centeno@izcalli.gob.mx','dependencia_id'=>1,'area_id'=>0,'password' => bcrypt('centeno.2017'),]);	
DB::table('users')->insert(['name' =>'Juan Carlos Sánchez Velarde','email' => 'juan.carlos.sanchez@izcalli.gob.mx','dependencia_id'=>7,'area_id'=>0,'password' => bcrypt('sanchez.2017'),]);	
DB::table('users')->insert(['name' =>'Rosy Arlene Ramírez Uresti','email' => 'arlene.ramirez@izcalli.gob.mx','dependencia_id'=>6,'area_id'=>0,'password' => bcrypt('ramirez.2017'),]);	
DB::table('users')->insert(['name' =>'Erika del Mazo Morales','email' => 'erika.delmazo@izcalli.gob.mx','dependencia_id'=>25,'area_id'=>0,'password' => bcrypt('delmazo.2017'),]);	
DB::table('users')->insert(['name' =>'Oscar Rodolfo Medina Nieto','email' => 'oscar.rodolfo.medina@izcalli.gob.mx','dependencia_id'=>9,'area_id'=>0,'password' => bcrypt('medina.2017'),]);	
DB::table('users')->insert(['name' =>'María Guadalupe Ramírez Bueno','email' => 'maria.guadalupe.ramirez@izcalli.gob.mx','dependencia_id'=>4,'area_id'=>0,'password' => bcrypt('ramirez.2017'),]);	
DB::table('users')->insert(['name' =>'Anselmo Hilario Zaragoza Esquinca','email' => 'anselmo.hilario.zaragoza@izcalli.gob.mx','dependencia_id'=>8,'area_id'=>0,'password' => bcrypt('zaragoza.2017'),]);	
DB::table('users')->insert(['name' =>'Mario Lino Salinas','email' => 'mario.lino@izcalli.gob.mx','dependencia_id'=>20,'area_id'=>0,'password' => bcrypt('lino.2017'),]);	
DB::table('users')->insert(['name' =>'Luis Rubén Palafox Hernández','email' => 'luis.ruben.palafox@inmundeci.gob.mx','dependencia_id'=>12,'area_id'=>0,'password' => bcrypt('palafox.2017'),]);	
DB::table('users')->insert(['name' =>'Samir Pacheco Siordia','email' => 'samir.pacheco@difizcalli.gob.mx','dependencia_id'=>23,'area_id'=>0,'password' => bcrypt('pacheco.2017'),]);	
DB::table('users')->insert(['name' =>'Mark Oblio Rivera Aguilar','email' => 'marck.rivera@operaguaci.gob.mx','dependencia_id'=>41,'area_id'=>0,'password' => bcrypt('rivera.2017'),]);	
DB::table('users')->insert(['name' =>'Alejandro Rafael Hernández Fonseca','email' => 'alejandro.rafael.hernandez@izcalli.gob.mx','dependencia_id'=>10,'area_id'=>0,'password' => bcrypt('hernandez.2017'),]);	
DB::table('users')->insert(['name' =>'Ivonne Jiménez García','email' => 'ivonne.jimenez@izcalli.gob.mx','dependencia_id'=>13,'area_id'=>0,'password' => bcrypt('jimenez.2017'),]);
DB::table('users')->insert(['name' =>'Alfredo Guillermo Torres Osorio','email' => 'alfredo.guillermo.torres@implanizcalli.gob.mx','dependencia_id'=>11,'area_id'=>0,'password' => bcrypt('torres.2017'),]);

/*
DB::table('users')->insert(['name' =>'RAMIREZ ALEJANDRE JUVENTINO','email' => 'juventino.ramirez@izcalli.gob.mx','area_id'=>3,'password' => bcrypt('ramirez.2016'),]);
DB::table('users')->insert(['name' =>'OLIVARES RODRIGUEZ MIGUEL','email' => 'miguel.olivares@izcalli.gob.mx','area_id'=>4,'password' => bcrypt('olivares.2016'),]);
DB::table('users')->insert(['name' =>'PLATA ARROYO IRMA IVETTE','email' => 'irma.ivette.plata@izcalli.gob.mx','area_id'=>5,'password' => bcrypt('plata.2016'),]);
DB::table('users')->insert(['name' =>'RAMIREZ URESTI ROSY ARLENE','email' => 'rosy.arlene.ramirez@izcalli.gob.mx','area_id'=>6,'password' => bcrypt('ramirez.2016'),]);
DB::table('users')->insert(['name' =>'RILLO HERNANDEZ ALAN LEONEL','email' => 'alan.leonel.rillo@izcalli.gob.mx','area_id'=>7,'password' => bcrypt('rillo.2016'),]);
DB::table('users')->insert(['name' =>'VALENCIA GONZALEZ GLORIA MARIA DEL CARMEN','email' => 'maria.carmen.valencia@izcalli.gob.mx','area_id'=>8,'password' => bcrypt('valencia.2016'),]);
DB::table('users')->insert(['name' =>'RENDON SANTANA MIGUEL EDUARDO','email' => 'miguel.eduardo.rendon@izcalli.gob.mx','area_id'=>9,'password' => bcrypt('rendon.2016'),]);
DB::table('users')->insert(['name' =>'ZARAGOZA ESQUINCA ANSELMO HILARIO','email' => 'anselmo.hilario.zaragoza@izcalli.gob.mx','area_id'=>10,'password' => bcrypt('zaragoza.2016'),]);
DB::table('users')->insert(['name' =>'DE LEON VAZQUEZ HECTOR IVAN','email' => 'hector.ivan.leon@izcalli.gob.mx','area_id'=>11,'password' => bcrypt('de.2016'),]);
DB::table('users')->insert(['name' =>'DEL MAZO MORALES ERIKA','email' => 'erika.delmazo@izcalli.gob.mx','area_id'=>12,'password' => bcrypt('delmazo.2016'),]);
DB::table('users')->insert(['name' =>'DIAZ PEREA LUIS ERNESTO','email' => 'luis.ernesto.diaz@izcalli.gob.mx','area_id'=>13,'password' => bcrypt('diaz.2016'),]);
DB::table('users')->insert(['name' =>'RODRIGUEZ MEZA KAREN IVETTE','email' => 'karen.ivette.rodriguez@izcalli.gob.mx','area_id'=>14,'password' => bcrypt('rodriguez.2016'),]);
DB::table('users')->insert(['name' =>'RAMIREZ BUENO MARIA GUADALUPE','email' => 'maria.guadalupe.ramirez@izcalli.gob.mx','area_id'=>15,'password' => bcrypt('ramirez.2016'),]);
DB::table('users')->insert(['name' =>'CASTILLO VAZQUEZ SALOMON','email' => 'salomon.castillo@izcalli.gob.mx','area_id'=>16,'password' => bcrypt('castillo.2016'),]);
DB::table('users')->insert(['name' =>'PEREZ MENDEZ JOSE MARTIN','email' => 'jose.martin.perez@izcalli.gob.mx','area_id'=>17,'password' => bcrypt('perez.2016'),]);
DB::table('users')->insert(['name' =>'MENDIETA VILLAGRAN CARLOS ALBERTO','email' => 'carlos.alberto.mendieta@izcalli.gob.mx','area_id'=>18,'password' => bcrypt('mendieta.2016'),]);
DB::table('users')->insert(['name' =>'LEMUS ALMAZAN SERGIO','email' => 'sergio.lemus@izcalli.gob.mx','area_id'=>19,'password' => bcrypt('lemus.2016'),]);
DB::table('users')->insert(['name' =>'SAAVEDRA RODRIGUEZ ALBERTO MARTIN','email' => 'alberto.martin.saavedra@izcalli.gob.mx','area_id'=>20,'password' => bcrypt('saavedra.2016'),]);
DB::table('users')->insert(['name' =>'SANCHEZ VELARDE JUAN CARLOS','email' => 'juan.carlos.sanchez@izcalli.gob.mx','area_id'=>21,'password' => bcrypt('sanchez.2016'),]);
DB::table('users')->insert(['name' =>'ANDA RUBALCAVA MITZI ALICIA','email' => 'mitzi.alicia.anda@izcalli.gob.mx','area_id'=>22,'password' => bcrypt('anda.2016'),]);
DB::table('users')->insert(['name' =>'JIMENEZ GARCIA IVONNE','email' => 'ivonne.jimenez@izcalli.gob.mx','area_id'=>23,'password' => bcrypt('jimenez.2016'),]);
DB::table('users')->insert(['name' =>'HERNANDEZ FONSECA ALEJANDRO RAFAEL','email' => 'alejandro.rafael.hernandez@izcalli.gob.mx','area_id'=>24,'password' => bcrypt('hernandez.2016'),]);
DB::table('users')->insert(['name' =>'CASTAÑEDA BERNAL ROCIO','email' => 'rocio.castañeda@izcalli.gob.mx','area_id'=>25,'password' => bcrypt('castañeda.2016'),]);
DB::table('users')->insert(['name' =>'CUELLAR ESCOTO GUADALUPE','email' => 'guadalupe.cuellar@izcalli.gob.mx','area_id'=>26,'password' => bcrypt('cuellar.2016'),]);
DB::table('users')->insert(['name' =>'ESPARZA HERNANDEZ DANIEL','email' => 'daniel.esparza@izcalli.gob.mx','area_id'=>27,'password' => bcrypt('esparza.2016'),]);
DB::table('users')->insert(['name' =>'PEREZ MEDINA MARTIN','email' => 'martin.perez@izcalli.gob.mx','area_id'=>28,'password' => bcrypt('perez.2016'),]);
DB::table('users')->insert(['name' =>'VALDEZ ALVAREZ ELIZABETH','email' => 'elizabeth.valdez@izcalli.gob.mx','area_id'=>29,'password' => bcrypt('valdez.2016'),]);
DB::table('users')->insert(['name' =>'BARAJAS VERDUZCO MONICA ALEJANDRA','email' => 'monica.alejandra.barajas@izcalli.gob.mx','area_id'=>30,'password' => bcrypt('barajas.2016'),]);
DB::table('users')->insert(['name' =>'HERNANDEZ SANCHEZ VERONICA','email' => 'veronica.hernandez@izcalli.gob.mx','area_id'=>31,'password' => bcrypt('hernandez.2016'),]);
DB::table('users')->insert(['name' =>'GUERRERO MARTINEZ JOSE SANTIAGO','email' => 'jose.santiago.guerrero@izcalli.gob.mx','area_id'=>32,'password' => bcrypt('guerrero.2016'),]);
DB::table('users')->insert(['name' =>'MEDINA NIETO OSCAR RODOLFO','email' => 'oscar.rodolfo.medina@izcalli.gob.mx','area_id'=>33,'password' => bcrypt('medina.2016'),]);
DB::table('users')->insert(['name' =>'MARTINEZ CRUZ MARCO ANTONIO','email' => 'marco.antonio.martinez@izcalli.gob.mx','area_id'=>34,'password' => bcrypt('martinez.2016'),]);
DB::table('users')->insert(['name' =>'MORALES HERNANDEZ EDUARDO','email' => 'eduardo.morales@izcalli.gob.mx','area_id'=>35,'password' => bcrypt('morales.2016'),]);
        */
    }
}
