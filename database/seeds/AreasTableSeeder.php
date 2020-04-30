<?php

use Illuminate\Database\Seeder;
use App\Area;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {		   
        // Consejero Presidente
		$area = new Area();
		$area->nombre = 'Presidencia del Consejo';
		$area->abreviatura = 'PC';
		$area->identificador = $this->generarIdentificador();
		$area->sello_digital =  Crypt::encryptString(mt_rand());
        $area->save();

        // Consejero Presidente
		$area = new Area();
		$area->nombre = 'Consejeros Electorales';
		$area->abreviatura = 'CE';
		$area->identificador = $this->generarIdentificador();
		$area->sello_digital =  Crypt::encryptString(mt_rand());
        $area->save();
        
		$area = new Area();
		$area->nombre = 'Secretaria Ejecutiva';
		$area->abreviatura = 'SE';
		$area->identificador = $this->generarIdentificador();
		$area->sello_digital =  Crypt::encryptString(mt_rand());
        $area->save();
        
		$area = new Area();
		$area->nombre = 'Dirección Ejecutiva de Prerrogativas y Partidos Políticos';
		$area->abreviatura = 'DEPPP';
		$area->identificador = $this->generarIdentificador();
		$area->sello_digital =  Crypt::encryptString(mt_rand());
        $area->save();
        
		$area = new Area();
		$area->nombre = 'Dirección Ejecutiva de Organización Electoral';
		$area->abreviatura = 'DEOE';
		$area->identificador = $this->generarIdentificador();
		$area->sello_digital =  Crypt::encryptString(mt_rand());
        $area->save();
        
		$area = new Area();
		$area->nombre = 'Dirección Ejecutiva de Capacitación Electoral y Educación Cívica';
		$area->abreviatura = 'DECEYEC';
		$area->identificador = $this->generarIdentificador();
		$area->sello_digital =  Crypt::encryptString(mt_rand());
        $area->save();
        
		$area = new Area();
		$area->nombre = 'Dirección Ejecutiva de Administración';
		$area->abreviatura = 'DEA';
		$area->identificador = $this->generarIdentificador();
		$area->sello_digital =  Crypt::encryptString(mt_rand());
        $area->save();
        
		$area = new Area();
		$area->nombre = 'Dirección Ejecutiva de Asuntos Jurídicos';
		$area->abreviatura = 'JUR';
		$area->identificador = $this->generarIdentificador();
		$area->sello_digital =  Crypt::encryptString(mt_rand());
        $area->save();
        
		$area = new Area();
		$area->nombre = 'Unidad de Fiscalización';
		$area->abreviatura = 'UF';
		$area->identificador = $this->generarIdentificador();
		$area->sello_digital =  Crypt::encryptString(mt_rand());
        $area->save();
        
		$area = new Area();
		$area->nombre = 'Unidad Técnica de Comunicación Social';
		$area->abreviatura = 'UTCS';
		$area->identificador = $this->generarIdentificador();
		$area->sello_digital =  Crypt::encryptString(mt_rand());
        $area->save();
        
		$area = new Area();
		$area->nombre = 'Unidad Técnica del Centro de Formación y Desarrollo';
		$area->abreviatura = 'UTCFD';
		$area->identificador = $this->generarIdentificador();
		$area->sello_digital =  Crypt::encryptString(mt_rand());
        $area->save();
        
		$area = new Area();
		$area->nombre = 'Unidad Técnica de Servicios Informáticos';
		$area->abreviatura = 'UTSI';
		$area->identificador = $this->generarIdentificador();
		$area->sello_digital =  Crypt::encryptString(mt_rand());
        $area->save();
        
		$area = new Area();
		$area->nombre = 'Unidad Técnica de Planeación';
		$area->abreviatura = 'UTP';
		$area->identificador = $this->generarIdentificador();
		$area->sello_digital =  Crypt::encryptString(mt_rand());
        $area->save();
        
		$area = new Area();
		$area->nombre = 'Unidad Técnica de Oficialía Electoral';
		$area->abreviatura = 'UTOE';
		$area->identificador = $this->generarIdentificador();
		$area->sello_digital =  Crypt::encryptString(mt_rand());
        $area->save();
        
		$area = new Area();
		$area->nombre = 'Unidad Técnica de Secretariado';
		$area->abreviatura = 'UTS';
		$area->identificador = $this->generarIdentificador();
		$area->sello_digital =  Crypt::encryptString(mt_rand());
        $area->save();
        
		$area = new Area();
		$area->nombre = 'Unidad Técnica de Vinculación con Órganos Desconcentrados y Organizaciones de la Sociedad Civil';
		$area->abreviatura = 'UTVODES';
		$area->identificador = $this->generarIdentificador();
		$area->sello_digital =  Crypt::encryptString(mt_rand());
        $area->save();
        
		$area = new Area();
		$area->nombre = 'Unidad Técnica de Igualdad de Género e Inclusión';
		$area->abreviatura = 'UTIGI';
		$area->identificador = $this->generarIdentificador();
		$area->sello_digital =  Crypt::encryptString(mt_rand());
        $area->save();
        
		$area = new Area();
		$area->nombre = 'Unidad Técnica de Transparencia';
		$area->abreviatura = 'UTT';
		$area->identificador = $this->generarIdentificador();
		$area->sello_digital =  Crypt::encryptString(mt_rand());
        $area->save();
        
		$area = new Area();
		$area->nombre = 'Órgano Interno de Control';
		$area->abreviatura = 'CONTRALORIA';
		$area->identificador = $this->generarIdentificador();
		$area->sello_digital =  Crypt::encryptString(mt_rand());
        $area->save();
	}
	
	private function generarIdentificador(){
		$randomString = str_random(2).rand().str_random(2);
		$identificador = '00000'.$randomString;
		return $identificador;
	}
}
