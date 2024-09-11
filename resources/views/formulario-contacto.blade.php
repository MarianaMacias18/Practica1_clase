<!DOCTYPE html>
<!-- HTML5 -->
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>



    <!-- Navegación  -->
    <div class="nav">
        <a href="index.html" class="nav-link">Inicio</a>
        <a href="formulario.html" class="nav-link">Formulario</a>
    </div>

    <h1 id="contact-title">Formulario de Contacto {{$tipo_persona}}</h1>

    <!-- Sintax Blade donde realiza una validación  -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif





    <form method="POST" action="/contacto-recibe">

        @if($tipo_persona == 'cliente')
        <label for="no_cliente"> Numero de cliente: </label>
        <input type="text" name="no_cliente" id="no_cliente"><br><br>
        @endif

        @csrf <!-- Token CSRF  -->
        <!-- Nombre text -->
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}"><br><br> <!-- Mantiene el registro del texto en el campo <- -->
        @error('nombre')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- Correo  email -->
        <label for="correo">Correo:</label>
        <input type="email" name="correo" value="{{ old('correo') }}" required><br><br>
        @error('correo')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- Comentario textarea -->
        <label for="mensaje">Comentario:</label><br>
        <textarea id="mensaje" name="mensaje" rows="4" cols="50">{{ old('mensaje') }}</textarea><br><br>
        @error('mensaje')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- Botón para enviar-->
        <button type="submit" class="submit-btn">Enviar</button>

    </form>
</body>

</html>