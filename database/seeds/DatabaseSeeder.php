<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        


          DB::table('users')->insert(['name' =>'GONZALEZ MEJIA GENESIS','email' => 'genesis.gonzalez@izcalli.gob.mx','area_id'=>2,'password' => bcrypt('gonzalez.2016'),]);


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
     



          DB::table('areas')->insert(['dependencia_id' =>1,'nombre'=>'Enlace Administrativo Comisaría']);
          DB::table('areas')->insert(['dependencia_id' =>1,'nombre'=>'Dirección de Seguridad Pública']);
          DB::table('areas')->insert(['dependencia_id' =>1,'nombre'=>'Dirección de Tránsito Municipal']);
          DB::table('areas')->insert(['dependencia_id' =>1,'nombre'=>'Dirección de Servicios al Público']);
          DB::table('areas')->insert(['dependencia_id' =>2,'nombre'=>'Enlace Administrativo Contraloría']);
          DB::table('areas')->insert(['dependencia_id' =>2,'nombre'=>'Dirección de Auditoría']);
          DB::table('areas')->insert(['dependencia_id' =>2,'nombre'=>'Dirección de Responsabilidades, Quejas y Denuncias']);
          DB::table('areas')->insert(['dependencia_id' =>3,'nombre'=>'Dirección de Administración y Finanzas DIF']);
          DB::table('areas')->insert(['dependencia_id' =>3,'nombre'=>'Dirección de Servicios de Asistencia Social']);
          DB::table('areas')->insert(['dependencia_id' =>3,'nombre'=>'Dirección de Servicios de Salud']);
          DB::table('areas')->insert(['dependencia_id' =>3,'nombre'=>'Dirección de Servicios Educativos']);
          DB::table('areas')->insert(['dependencia_id' =>3,'nombre'=>'Procuraduría de Protección del Menor y la Familia']);
          DB::table('areas')->insert(['dependencia_id' =>4,'nombre'=>'Dirección de Recursos Humanos']);
          DB::table('areas')->insert(['dependencia_id' =>4,'nombre'=>'Dirección de Recursos Materiales y Servicios Generales']);
          DB::table('areas')->insert(['dependencia_id' =>4,'nombre'=>'Dirección de Tecnologías de la Información']);
          DB::table('areas')->insert(['dependencia_id' =>5,'nombre'=>'Enlace Administrativo Desarrollo Económico']);
          DB::table('areas')->insert(['dependencia_id' =>5,'nombre'=>'Dirección de Promoción Económica']);
          DB::table('areas')->insert(['dependencia_id' =>5,'nombre'=>'Dirección de Abasto y Comercio']);
          DB::table('areas')->insert(['dependencia_id' =>6,'nombre'=>'Enlace Administrativo Desarrollo Humano']);
          DB::table('areas')->insert(['dependencia_id' =>6,'nombre'=>'Dirección de Desarrollo Social']);
          DB::table('areas')->insert(['dependencia_id' =>6,'nombre'=>'Dirección de Cultura']);
          DB::table('areas')->insert(['dependencia_id' =>6,'nombre'=>'Dirección de Educación']);
          DB::table('areas')->insert(['dependencia_id' =>6,'nombre'=>'Dirección General de Desarrollo Económico']);
          DB::table('areas')->insert(['dependencia_id' =>7,'nombre'=>'Enlace Administrativo Desarrollo Metropolitano']);
          DB::table('areas')->insert(['dependencia_id' =>7,'nombre'=>'Dirección de Desarrollo Urbano']);
          DB::table('areas')->insert(['dependencia_id' =>7,'nombre'=>'Dirección de Obras Públicas']);
          DB::table('areas')->insert(['dependencia_id' =>7,'nombre'=>'Dirección de Medio Ambiente']);
          DB::table('areas')->insert(['dependencia_id' =>8,'nombre'=>'Dirección General de Servicios Jurídicos']);
          DB::table('areas')->insert(['dependencia_id' =>8,'nombre'=>'Enlace Administrativo Servicios Jurídicos']);
          DB::table('areas')->insert(['dependencia_id' =>8,'nombre'=>'Dirección Jurídica Consultiva']);
          DB::table('areas')->insert(['dependencia_id' =>8,'nombre'=>'Dirección Jurídica Contenciosa']);
          DB::table('areas')->insert(['dependencia_id' =>9,'nombre'=>'Enlace Administrativo Servicios Públicos']);
          DB::table('areas')->insert(['dependencia_id' =>9,'nombre'=>'Dirección de Parques y Jardines']);
          DB::table('areas')->insert(['dependencia_id' =>9,'nombre'=>'Dirección de Limpia']);
          DB::table('areas')->insert(['dependencia_id' =>11,'nombre'=>'Enlace Administrativo IMPLAN']);
          DB::table('areas')->insert(['dependencia_id' =>12,'nombre'=>'Coordinación de Cultura Física']);
          DB::table('areas')->insert(['dependencia_id' =>12,'nombre'=>'Coordinación de Calidad para el Deporte']);
          DB::table('areas')->insert(['dependencia_id' =>12,'nombre'=>'Coordinación de Administración INMUDECI']);
          DB::table('areas')->insert(['dependencia_id' =>14,'nombre'=>'Dirección de Desarrollo Administrativo']);
          DB::table('areas')->insert(['dependencia_id' =>14,'nombre'=>'Dirección de Control y Evaluación Organizacional']);
          DB::table('areas')->insert(['dependencia_id' =>14,'nombre'=>'Dirección de Innovación Institucional']);
          DB::table('areas')->insert(['dependencia_id' =>14,'nombre'=>'Dirección de Políticas Públicas Municipales']);
          DB::table('areas')->insert(['dependencia_id' =>14,'nombre'=>'Enlace Administrativo Presidencia']);
          DB::table('areas')->insert(['dependencia_id' =>15,'nombre'=>'Oficina de la Presidencia']);
          DB::table('areas')->insert(['dependencia_id' =>15,'nombre'=>'Secretaría Particular']);
          DB::table('areas')->insert(['dependencia_id' =>15,'nombre'=>'Coordinación General de Comunicación Social']);
          DB::table('areas')->insert(['dependencia_id' =>15,'nombre'=>'Coordinación de Atención Ciudadana']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Décimo Tercero']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Décimo Cuarto']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Décimo Quinto']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Décimo Sexto']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Primer']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Segundo']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Tercero']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Cuarto']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Quinto']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Sexto']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Séptimo']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Octavo']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Noveno']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Décimo']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Décimo Primero']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Décimo Segundo']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Décimo Tercero']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Décimo Cuarto']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Décimo Quinto']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Décimo Sexto']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Primer']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Segundo']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Tercero']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Cuarto']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Quinto']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Sexto']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Séptimo']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Octavo']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Décimo']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Décimo Primero']);
          DB::table('areas')->insert(['dependencia_id' =>16,'nombre'=>'Décimo Segundo']);
          DB::table('areas')->insert(['dependencia_id' =>17,'nombre'=>'Enlace Administrativo Secretaría del Ayuntamiento']);
          DB::table('areas')->insert(['dependencia_id' =>17,'nombre'=>'Subsecretaría de Gobierno']);
          DB::table('areas')->insert(['dependencia_id' =>17,'nombre'=>'Subsecretaría del Ayuntamiento']);
          DB::table('areas')->insert(['dependencia_id' =>17,'nombre'=>'Subsecretaría de Vinculación']);
          DB::table('areas')->insert(['dependencia_id' =>18,'nombre'=>'Primera']);
          DB::table('areas')->insert(['dependencia_id' =>18,'nombre'=>'Segunda']);
          DB::table('areas')->insert(['dependencia_id' =>18,'nombre'=>'Tercera']);
          DB::table('areas')->insert(['dependencia_id' =>18,'nombre'=>'Primera']);
          DB::table('areas')->insert(['dependencia_id' =>18,'nombre'=>'Segunda']);
          DB::table('areas')->insert(['dependencia_id' =>18,'nombre'=>'Tercera']);
          DB::table('areas')->insert(['dependencia_id' =>19,'nombre'=>'Enlace Administrativo Tesorería']);
          DB::table('areas')->insert(['dependencia_id' =>19,'nombre'=>'Subtesorería de Ingresos']);
          DB::table('areas')->insert(['dependencia_id' =>19,'nombre'=>'Subtesorería de Egresos']);
          DB::table('areas')->insert(['dependencia_id' =>20,'nombre'=>'Enlace Administrativo Protección Civil']);




          DB::table('users')->insert(['name' =>'Gloria Cristina Báez Rodríguez','email'=>'gloria.cristina.baez@izcalli.gob.mx','dependencia_id'=>14,'area_id'=>39,'password' => bcrypt('asd123'),]);
          DB::table('users')->insert(['name' =>'Guadalupe Cuellar Escoto','email'=>'guadalupe.cuellar@izcalli.gob.mx','dependencia_id'=>14,'area_id'=>40,'password' => bcrypt('asd123'),]);
          DB::table('users')->insert(['name' =>'Elizabeth Valdez Álvarez','email'=>'elizabeth.valdez@izcalli.gob.mx','dependencia_id'=>14,'area_id'=>41,'password' => bcrypt('asd123'),]);
          DB::table('users')->insert(['name' =>'Martín Pérez Medina','email'=>'martin.perez@izcalli.gob.mx','dependencia_id'=>14,'area_id'=>42,'password' => bcrypt('asd123'),]);
          DB::table('users')->insert(['name' =>'Ricardo Chávez Almazán','email'=>'ricardo.chavez@izcalli.gob.mx','dependencia_id'=>14,'area_id'=>43,'password' => bcrypt('asd123'),]);
          DB::table('users')->insert(['name' =>'Iván de Guadalupe García Díaz','email'=>'ivan.guadalupe.garcia@izcalli.gob.mx','dependencia_id'=>14,'password' => bcrypt('asd123'),]);




          DB::table('personas')->insert(['nombre' =>'Loth Oswaldo','apaterno'=>'Centeno','amaterno'=>'Lara','area_id'=>0,'dependencia_id'=>1]);
          DB::table('personas')->insert(['nombre' =>'Miguel Ángel','apaterno'=>'García','amaterno'=>'López','area_id'=>0,'dependencia_id'=>2]);
          DB::table('personas')->insert(['nombre' =>'Natalia','apaterno'=>'Reyes','amaterno'=>'Flores','area_id'=>0,'dependencia_id'=>3]);
          DB::table('personas')->insert(['nombre' =>'María Guadalupe','apaterno'=>'Ramírez','amaterno'=>'Bueno','area_id'=>0,'dependencia_id'=>4]);
          DB::table('personas')->insert(['nombre' =>'Erika','apaterno'=>'del Mazo','amaterno'=>'Morales','area_id'=>0,'dependencia_id'=>5]);
          DB::table('personas')->insert(['nombre' =>'Rosy Arlene','apaterno'=>'Ramírez','amaterno'=>'Uresti','area_id'=>0,'dependencia_id'=>6]);
          DB::table('personas')->insert(['nombre' =>'Juan Carlos','apaterno'=>'Sánchez','amaterno'=>'Velarde','area_id'=>0,'dependencia_id'=>7]);
          DB::table('personas')->insert(['nombre' =>'Anselmo Hilario','apaterno'=>'Zaragoza','amaterno'=>'Esquinca','area_id'=>0,'dependencia_id'=>8]);
          DB::table('personas')->insert(['nombre' =>'Oscar Rodolfo','apaterno'=>'Medina','amaterno'=>'Nieto','area_id'=>0,'dependencia_id'=>9]);
          DB::table('personas')->insert(['nombre' =>'Alejandro Rafael','apaterno'=>'Hernández','amaterno'=>'Fonseca','area_id'=>0,'dependencia_id'=>10]);
          DB::table('personas')->insert(['nombre' =>'Alfredo Guillermo','apaterno'=>'Torres','amaterno'=>'Osorio','area_id'=>0,'dependencia_id'=>11]);
          DB::table('personas')->insert(['nombre' =>'Rubén','apaterno'=>'Palafox','amaterno'=>'Hernández.','area_id'=>0,'dependencia_id'=>12]);
          DB::table('personas')->insert(['nombre' =>'Ivonne','apaterno'=>'Jiménez','amaterno'=>'García','area_id'=>0,'dependencia_id'=>13]);
          DB::table('personas')->insert(['nombre' =>'Iván de Guadalupe','apaterno'=>'García','amaterno'=>'Díaz','area_id'=>0,'dependencia_id'=>14]);
          DB::table('personas')->insert(['nombre' =>'Víctor Manuel','apaterno'=>'Estrada','amaterno'=>'Garibay','area_id'=>0,'dependencia_id'=>15]);
          DB::table('personas')->insert(['nombre' =>'Rubén','apaterno'=>'Reyes','amaterno'=>'Madero','area_id'=>0,'dependencia_id'=>17]);
          DB::table('personas')->insert(['nombre' =>'Juan Carlos','apaterno'=>'Zavaleta','amaterno'=>'Sánchez','area_id'=>0,'dependencia_id'=>19]);
          DB::table('personas')->insert(['nombre' =>'Mario','apaterno'=>'Lino','amaterno'=>'Salinas','area_id'=>0,'dependencia_id'=>20]);
          DB::table('personas')->insert(['nombre' =>'Elizabeth','apaterno'=>'Valdez','amaterno'=>'Álvarez','area_id'=>41,'dependencia_id'=>14]);
  
    }
}





