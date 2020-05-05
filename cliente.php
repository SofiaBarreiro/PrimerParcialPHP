<?php

class cliente{


   
    public $email;
   
    public $clave;



    public function __construct($email, $clave)    
    {  
        $this->email = $email;
       
        $this->clave = $clave;

    }   

    public function guardarCliente ()    
    {  
        $file = fopen("users.json", "a+");

        $json = json_encode($this);
        fwrite($file, $json .",");

        fclose($file);

    }  

    public static function crearToken($clave, $email){

    
        $payload = array(
            "iss" => "http://example.org",
            "aud" => "http://example.com",
            "iat" => 1356999524,
            "nbf" => 1357000000,
            "clave" => $clave,
            "nombre" => $email,
    
        );
    
    
        return $payload;
    }


    public static function buscarCliente($email)
    {

        
        $lista = cliente::leerJSON('users.json');

        $personaEncontrada = '';


        /* foreach ($arrayJSON as $value) {
       


            if ($value->email == $email) {
                $personaEncontrada = $value;
                break;
            }
        }
 */
        echo $personaEncontrada;

        return $personaEncontrada;

    }



    static public function leerJSON()
    {
        $file = fopen('users.json', 'r');


        $arrayString = fread($file, filesize('users.json'));



        $arrayJSON = json_decode($arrayString);

        
        fclose($file);

        
        return $arrayString;



    }

}


