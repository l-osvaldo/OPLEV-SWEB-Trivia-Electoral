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

function encrypt_notify($password, $mensaje)
{
    $salt           = 'L%&li6@g^Ccs8h_+!0^m83EvK%Xq0eJby4|dosm!ArX?G#Be6b|v-nCV85OtThCjD^RatZhW_mRm18ccRcqbZGtp0S-VaUlWhGVF5uBbOryOp0I@H*y==#?Qw&jWnt8oy_r^dIvto#og2a87A#4j0G8cxXg=vMOwf$?0wZe-09TAAIAoJ=Gpub-Jv+hl!w+b+nfKVTCbxC4YulAfpcCT1a^WCF_Gh0ag4Z*ri=80%X5CvD=bMtQiP%dsk1!hSnA6';
    $iv             = 'BC}R#{vQg)8p)!&a';
    $iterations     = 999;
    $key            = hash_pbkdf2("sha512", $password, $salt, $iterations, 64);
    $encrypted_data = openssl_encrypt($mensaje, 'aes-256-cbc', hex2bin($key), OPENSSL_RAW_DATA, $iv);
    $data           = array("ciphertext" => base64_encode($encrypted_data), "iv" => bin2hex($iv), "salt" => bin2hex($salt));
    return json_encode($data);
}
