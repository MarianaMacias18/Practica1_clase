<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contacto</title>
</head>
<body>
    <h1>Formulario de Contacto</h1>
    <form action="/contacto-recibe" method="POST" >
        @csrf
        <label form="nombre">Nombre:</label>
        <input type="text" name="nombre"><br><br>

        <label form="correo">Correo:</label>
        <input type="email" name="correo"><br><br>

        <label form="mensaje">Mensaje:</label><br>
        <textarea name="mensaje" cols="50" rows="4"></textarea><br><br>

        <input type="submit" value="enviar">
    </form>


</body>
</html>