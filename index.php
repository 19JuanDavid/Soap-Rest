<!--NOTA:
En el formulario de registro de usuarios, una vez se haya registrado un usuario, 
click en aceptar el alert y recargar la página para visualizar el usuario registrado en la tabla de usuarios registrados.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOAP-REST</title>
</head>
<body>
    <header>
        <h2>Registro de usuarios</h2>
    </header>
    <form id="registroFormulario" action="http://localhost/entorno_servidor/Practica_Soap/SOAP/clienteSoap.php" method="post">
        <div>
            <Label>Introduce un usuario</Label>
        </div>
        <div>
            <input type="text" name="nombre" id="nombreUsuario" required>
        </div>
        <div>
            <label>Introduce un correo</label>
        </div>
        <div>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label>Introduce una contraseña</label>
        </div>
        <div>
        <input type="password" name="contraseña" id="contraseña" required>
        </div>
        <button type="submit">Registrar</button>
    </form>

    <h1>Usuarios Registrados</h1>
  <table>
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody id="tabla-usuarios">
    </tbody>
  </table>

    <script src="main.js"></script>
</body>
</html>