<?php

/*NOTA:
En el formulario de registro de usuarios, una vez se haya registrado un usuario, 
click en aceptar el alert y recargar la página para visualizar el usuario registrado en la tabla de usuarios registrados.
*/


require_once __DIR__ . '/../POPOS/user.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['nombre']) || !isset($_POST['email']) || !isset($_POST['contraseña'])) {}

    $nombreUsuario = $_POST['nombre'];
    $correo = $_POST['email'];
    $contrasena = $_POST['contraseña'];

    $usuario = new user($nombreUsuario, $correo, $contrasena);

    try {
        $cliente = new SoapClient(null, [
            'location' => "http://localhost/entorno_servidor/Practica_Soap/SOAP/servidorSoap.php", 
            'uri' => "http://localhost/entorno_servidor/PRACTICA_SOAP", 
            //'trace' => 1, 
        ]);

        $response = $cliente->guardarUsuarios(
            $usuario->getNombreUsuario(),
            $usuario->getCorreo(),
            $usuario->getContrasena()
        );

    } catch (SoapFault $e) {
        echo "No se ha podido almacenar ningun usuario";
    }
} 
?>
