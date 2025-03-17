

document.addEventListener("DOMContentLoaded", () => {
    cargarUsuarios();
});

const formulario = document.getElementById('registroFormulario');

formulario.addEventListener('submit', async (event) => {
    event.preventDefault();

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

try {

     fetch('http://localhost/entorno_servidor/SOAP-REST/SOAP/servidorSoap.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'text/xml; charset=utf-8',
        },
        body: soapRequest,
    });
    alert(`Usuario ${nombreUsuario} registrado correctamente`);

    cargarUsuarios();

    formulario.reset();

    document.addEventListener("DOMContentLoaded", () => {
        cargarUsuarios();
    });

    } catch (error) {
        console.error('Error al registrar el usuario:', error);
}

});


// Este método es para cargar con API REST los usuarios registrados
async function cargarUsuarios() {
    try {
        const answer = await fetch('http://localhost/entorno_servidor/SOAP-REST/REST/apiRest.php')
        if (!answer.ok) {
            throw new Error(`Error al obtener los usuarios: ${answer.statusText}`);
        }
        const data = await answer.json();
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

    } catch (error) {
        console.error('Error al cargar los usuarios:', error);
    };
}
