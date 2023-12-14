    <title>Iniciar Sesión</title>
</head>
<body>
    <h1>Bienvenido, introduzca sus credenciales</h1>
    <form action="index.php?controlador=controlador_login&accion=login" method="post">
        <label for="usuario">Correo: </label>
        <input type="text" name="correo" required><br>

        <label for="contrasena">Contraseña: </label>
        <input type="password" name="contrasena" required><br>

        <input type="submit" value="Iniciar Sesión">
    </form>
