<?php

function base64url_encode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

class authApiHelper {

    private $key;

    function __construct() {
        // palabra clave privada
        $this->key = '**giten**';
    }

    function getBasic() {
        // get header
        $header = $this->getHeader();
        // ^ Basic base64(user:password) ([1])
        if (strpos($header,"Basic ") === 0) {
            $usrpass = explode(" ",$header)[1];
            // base64(user:pass)
            $usrpass = explode(':', base64_decode($usrpass));
            if (count($usrpass) === 2){
                $user = $usrpass[0];
                $pass = $usrpass[1];
                return array(
                    "usuario" => $user,
                    "password" => $pass
                );
            }
        }
        return null;
    }

    function getUser(){
        $header = $this->getHeader();
        // Bearer XXXXXX.XXXXXXX.XXXXXXX
        if (strpos($header,"Bearer ") === 0) {
            // XXXXXX.XXXXXXX.XXXXXXX
            $token = explode(" ", $header)[1];
            $parts = explode(".", $token);
            if (count($parts) === 3) {
                $header = $parts[0];
                $payload = $parts[1];
                $signature = $parts[2];
                $new_signature = base64url_encode(hash_hmac('SHA256', "$header.$payload", $this->key, true));
                if ($signature == $new_signature) {
                    $payload = json_decode(base64_decode($payload));
                    return $payload;
                }
            }
        }
        return null;
    }

    public function createToken($user) {
        $header = array(
            'alg' => 'HS256',
            "typ" => 'JWT'
        );

        $payload = array(
            "sub" => $user->id_usuario,
            "name" => $user->nombre,
            "rol" => $user->permisos
        );

        $header = base64url_encode(json_encode($header));
        $payload = base64url_encode(json_encode($payload));
        $signature = base64url_encode(hash_hmac('SHA256', "$header.$payload", $this->key, true));
        return "$header.$payload.$signature";
    }

    function getHeader(){
        if(isset($_SERVER["REDIRECT_HTTP_AUTHORIZATION"])){
            return $_SERVER["REDIRECT_HTTP_AUTHORIZATION"];
        }
        if(isset($_SERVER["HTTP_AUTHORIZATION"])){
            return $_SERVER["HTTP_AUTHORIZATION"];
        }
        return null;
    }

}

?>