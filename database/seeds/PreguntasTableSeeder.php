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
        $pregunta->pregunta  = '¿Pregunta?';
        $pregunta->opcion_a  = 'opcion_a';
        $pregunta->opcion_b  = 'opcion_b';
        $pregunta->opcion_c  = 'opcion_c';
        $pregunta->opcion_d  = 'opcion_d';
        $pregunta->respuesta = 'b';
        $pregunta->save();

        $pregunta            = new Pregunta();
        $pregunta->pregunta  = '¿Pregunta?';
        $pregunta->opcion_a  = 'opcion_a';
        $pregunta->opcion_b  = 'opcion_b';
        $pregunta->opcion_c  = 'opcion_c';
        $pregunta->opcion_d  = 'opcion_d';
        $pregunta->respuesta = 'a';
        $pregunta->save();

        $pregunta            = new Pregunta();
        $pregunta->pregunta  = '¿Pregunta?';
        $pregunta->opcion_a  = 'opcion_a';
        $pregunta->opcion_b  = 'opcion_b';
        $pregunta->opcion_c  = 'opcion_c';
        $pregunta->opcion_d  = 'opcion_d';
        $pregunta->respuesta = 'c';
        $pregunta->save();
    }
}
