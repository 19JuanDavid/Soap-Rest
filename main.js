/*NOTA:
En el formulario de registro de usuarios, una vez se haya registrado un usuario, 
click en aceptar el alert y recargar la página para visualizar el usuario registrado en la tabla de usuarios registrados.
*/

const formulario = document.getElementById('registroFormulario');

formulario.addEventListener('submit', (event) => {
    event.preventDefault(); 
    enviarDatos();
});

// Este método es para enviar los datos desde el formulario con SOAP
function enviarDatos() {
    const nombreUsuario = document.getElementById('nombreUsuario').value;
    const email = document.getElementById('email').value;
    const contraseña = document.getElementById('contraseña').value;
    
    const soapRequest = 
        `<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://localhost/PRACTICA_SOAP">
            <soapenv:Header/>
            <soapenv:Body>
                <ser:guardarUsuarios>
                    <nombreUsuario>${nombreUsuario}</nombreUsuario>
                    <correo>${email}</correo>
                    <contrasena>${contraseña}</contrasena>
                </ser:guardarUsuarios>
            </soapenv:Body>
        </soapenv:Envelope>`;

    fetch('http://localhost/entorno_servidor/PRACTICA_SOAP/SOAP/servidorSoap.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'text/xml; charset=utf-8',
        },
        body: soapRequest,
    })
        .then((data) => {
            alert(`Usuario ${nombreUsuario} registrado correctamente`);
        })
        .catch((error) => {
            alert('No se pudo registrar el usuario');
        });
}

document.addEventListener("DOMContentLoaded", () => {
    cargarUsuarios();
});

// Este método es para cargar los usuarios registrados con REST
function cargarUsuarios() {
    fetch('http://localhost/entorno_servidor/PRACTICA_SOAP/REST/apiRest.php')
        .then(response => response.json())
        .then(data => {
            const tablaUsuarios = document.getElementById('tabla-usuarios');
            tablaUsuarios.innerHTML = ''; 

            data.forEach(usuario => {
                const fila = document.createElement('tr');
                fila.innerHTML = `
                    <td>${usuario.nombreUsuario}</td>
                    <td>${usuario.correoUsuario}</td>
                `;
                tablaUsuarios.appendChild(fila);
            });
        })
        .catch(error => {
            console.error('Error al cargar los usuarios:', error);
        });
}
