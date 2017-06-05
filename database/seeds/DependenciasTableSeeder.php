<?php

use Illuminate\Database\Seeder;

class DependenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



		DB::table('dependencias')->insert(['nombre' =>'Comisaría General de Seguridad Pública y Tránsito']);
		DB::table('dependencias')->insert(['nombre' =>'Contraloría Municipal']);
		DB::table('dependencias')->insert(['nombre' =>'Desarrollo Integral de la Familia']);
		DB::table('dependencias')->insert(['nombre' =>'Dirección General de Administración']);
		DB::table('dependencias')->insert(['nombre' =>'Dirección General de Desarrollo Económico']);
		DB::table('dependencias')->insert(['nombre' =>'Dirección General de Desarrollo Humano']);
		DB::table('dependencias')->insert(['nombre' =>'Dirección General de Desarrollo Metropolitano']);
		DB::table('dependencias')->insert(['nombre' =>'Dirección General de Servicios Juridicos']);
		DB::table('dependencias')->insert(['nombre' =>'Dirección General de Servicios Públicos']);
		DB::table('dependencias')->insert(['nombre' =>'Instituto Municipal de la Juventud']);
		DB::table('dependencias')->insert(['nombre' =>'Instituto Municipal de Planeación']);
		DB::table('dependencias')->insert(['nombre' =>'Instituto Municipal del Deporte']);
		DB::table('dependencias')->insert(['nombre' =>'Instituto Municipal para la Igualdad y Empoderamiento entre Mujeres y Hombres']);
		DB::table('dependencias')->insert(['nombre' =>'Oficina de la Presidencia']);
		DB::table('dependencias')->insert(['nombre' =>'Presidencia']);
		DB::table('dependencias')->insert(['nombre' =>'Regidurías']);
		DB::table('dependencias')->insert(['nombre' =>'Secretaría del Ayuntamiento']);
		DB::table('dependencias')->insert(['nombre' =>'Sindicaturas']);
		DB::table('dependencias')->insert(['nombre' =>'Tesorería Municipal']);
		DB::table('dependencias')->insert(['nombre' =>'Unidad Municipal de Protección Civil']);

		


/*
DB::table('users')->insert(['name' =>'GONZALEZ MEJIA GENESIS','email' => 'genesis.gonzalez@izcalli.gob.mx','area_id'=>2,'password' => bcrypt('gonzalez.2016'),]);
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
