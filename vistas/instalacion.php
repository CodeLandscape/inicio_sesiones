<title>Registro</title>
</head>

<body>
    <div class="container">
        <h1>Registro SuperAdmin</h1>
        <form action="?controlador=controlador_registro&accion=register" method="post">
            <label for="correo">Correo: </label>
            <input type="email" name="correo" required><br>

            <label for="usuario">Nombre Login: </label>
            <input type="text" name="usuario" required><br>

            <label for="contrasena">Contraseña: </label>
            <input type="password" name="contrasena" required><br>

            <label for="nombre">Nombre Usuario: </label>
            <input type="text" name="nombre" required><br>

            <input type="submit" value="Registrar">
        </form>
    </div>