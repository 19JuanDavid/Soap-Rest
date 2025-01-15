<?php

/*NOTA:
En el formulario de registro de usuarios, una vez se haya registrado un usuario, 
click en aceptar el alert y recargar la página para visualizar el usuario registrado en la tabla de usuarios registrados.
*/

class user{

    private $nombreUsuario = "";
    private $correo = "";
    private $contrasena = "";


    public function __construct($nombreUsuario, $correo, $contrasena) {
        $this->$nombreUsuario = $nombreUsuario;
        $this->$correo = $correo;
        $this->$contrasena = $contrasena;

    }
    
    public function getNombreUsuario(){
        return $this->nombreUsuario;
    }
    public function getCorreo(){
        return $this->correo;
    }
    public function getContrasena(){
        return $this->contrasena;
    }

    public function toArray() {
        return [
            'nombreUsuario' => $this->getNombreUsuario(),
            'correo' => $this->getCorreo(),
            'contrasena' => $this->getContrasena()
        ];
    }

}