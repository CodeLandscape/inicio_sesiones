<?php
require_once 'modelos/modelo_login.php';

class controlador_login {
    private $modelo;
    public $vista;

    public function __construct() {
        $this->modelo = new ModeloLogin();
        $this->vista = null;
    }
    public function inicio() {
        $this->vista = 'inicio';
    }
    public function panel_administracion() {
        $this->vista = 'panel_administracion';
    }
    public function usuario() {
        $this->vista = 'usuario';
    }
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            $usuario = $this->modelo->validarUsuario($correo, $contrasena);

            if ($usuario) {
                session_start();
                $_SESSION['nombre'] = $usuario['nombre'];
                $_SESSION['perfil'] = $usuario['perfil'];

                if ($usuario['perfil'] == 'admin') {
                    header('Location: index.php?controlador=controlador_login&accion=panel_administracion');
                } elseif ($usuario['perfil'] == 'usuario') {
                    header('Location: index.php?controlador=controlador_login&accion=usuario');
                } else {
                    echo "Perfil no válido. Deberías estar en algún lugar.";
                }
            } else {
                echo "Usuario o contraseña incorrectos.";
            }
        }
    }
    public function logout(){
        session_start();

        // Destruir todas las variables de sesión
        session_destroy();
        // Redirigir al usuario a la página de inicio
        header('Location: index.php');
        exit();
    }
}
?>
