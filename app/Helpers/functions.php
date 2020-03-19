<?php
//funcion global
//1 Crea el archivo functions.php. y guardalo dentro de la carpeta app/Helpers
//2 agrega las funciones al archivo fuctions.php
//3 En composer.json dentro de la sección de autoload agregue la siguiente línea: "files": ["app/Helpers/functions.php"]
//4 Correr el comando composer dump-autoload

function global_function_example()
{
	$user   = auth()->user();
    return $user->name;
}