<?php

use App\Pregunta;
use Illuminate\Database\Seeder;

class PreguntasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pregunta            = new Pregunta();
        $pregunta->pregunta  = 'Pregunta 01';
        $pregunta->opcion_a  = 'opc_a';
        $pregunta->opcion_b  = 'opc_b';
        $pregunta->opcion_c  = 'opc_c';
        $pregunta->opcion_d  = 'opc_d';
        $pregunta->respuesta = 'b';
        $pregunta->save();

        $pregunta            = new Pregunta();
        $pregunta->pregunta  = 'Pregunta 02';
        $pregunta->opcion_a  = 'opc_a';
        $pregunta->opcion_b  = 'opc_b';
        $pregunta->opcion_c  = 'opc_c';
        $pregunta->opcion_d  = 'opc_d';
        $pregunta->respuesta = 'a';
        $pregunta->save();

        $pregunta            = new Pregunta();
        $pregunta->pregunta  = 'Pregunta 03';
        $pregunta->opcion_a  = 'opc_a';
        $pregunta->opcion_b  = 'opc_b';
        $pregunta->opcion_c  = 'opc_c';
        $pregunta->opcion_d  = 'opc_d';
        $pregunta->respuesta = 'c';
        $pregunta->save();
    }
}
