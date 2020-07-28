<?php
//funcion global
//1 Crea el archivo functions.php. y guardalo dentro de la carpeta app/Helpers
//2 agrega las funciones al archivo fuctions.php
//3 En composer.json dentro de la sección de autoload agregue la siguiente línea: "files": ["app/Helpers/functions.php"]
//4 Correr el comando composer dump-autoload

function global_function_example()
{
    $user = 'Sistema';
    return $user;
}

function public_asset($path, $secure = null)
{
    if (request()->getHttpHost() == 'rosc.test') {
        return app('url')->asset($path, $secure);
    }
    return app('url')->asset('public/' . $path, $secure);
}

function encrypt_decrypt($action, $string)
{
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key     = 'This is my secret key';
    $secret_iv      = 'This is my secret iv';

    $key = hash('sha256', $secret_key);
    $iv  = substr(hash('sha256', $secret_iv), 0, 16);

    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else {
        if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
    }

    return $output;
}
