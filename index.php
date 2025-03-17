<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOAP-REST</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 flex flex-col items-center p-6">

    <header class="mb-6">
        <h2 class="text-3xl font-bold text-gray-100">Registro de usuarios</h2>
    </header>

    <div class="bg-gray p-6 rounded-lg shadow-md w-full max-w-md">
        <form id="registroFormulario" action="entorno_servidor/Soap-Rest/main.js" method="post" class="space-y-4">
            <div>
                <label class="block text-gray-100 font-semibold">Introduce un usuario</label>
                <input type="text" name="nombre" id="nombreUsuario" required
                    class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900">
            </div>
            <div>
                <label class="block text-gray-100 font-semibold">Introduce un correo</label>
                <input type="email" name="email" id="email" required
                    class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900">
            </div>
            <div>
                <label class="block text-gray-100 font-semibold">Introduce una contraseña</label>
                <input type="password" name="contraseña" id="contraseña" required
                    class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900">
            </div>
            <button type="submit" class="w-full bg-blue-950 text-white py-2 rounded-lg hover:bg-blue-900">Registrar</button>
        </form>
    </div>

    <div class="mt-8 w-full max-w-2xl">
        <h1 class="text-2xl font-bold text-gray-100 mb-4">Usuarios Registrados</h1>
        <div class="bg-white p-4 rounded-lg shadow-md overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-blue-950">
                        <th class="border border-blue-950 text-gray-100 p-2">Nombre</th>
                        <th class="border border-blue-950 text-gray-100 p-2">Email</th>
                    </tr>
                </thead>
                <tbody id="tabla-usuarios" class="text-center"></tbody>
            </table>
        </div>
    </div>

    <script src="main.js"></script>
</body>
</html>