<?php
require_once 'modelos/modelo_registro.php';

class controlador_registro {
    private $modelo;
    public $vista;

    public function __construct() {
        $this->modelo = new ModeloRegistro();
        $this->vista = null;
    }

    public function registroAdminJuego(){
        $this->vista = 'registroAdminJuegos';
    }
    public function registro(){
        $this->vista = 'instalacion';
        // Verificar si ya hay SuperAdmin registrado
        $superAdminRegistrado = $this->modelo->verificarSuperAdmin();

        // Si no hay SuperAdmin registrado, mostrar el formulario de registro
        if (!$superAdminRegistrado) {
            $this->vista = 'instalacion';
        } else {
            // Si ya hay SuperAdmin registrado, redirigir al panel de administración
            header('Location: index.php?controlador=controlador_login&accion=inicio');
            exit();
        }
    }
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            $perfil = "admin";

            //encriptacion de contraseña mediante password hash
            $contrasenaEncriptada = password_hash($contrasena, PASSWORD_DEFAULT);

            $exito = $this->modelo->registrarSuperAdmin($correo, $contrasenaEncriptada, $perfil, $nombre);

            if ($exito) {
                echo "Super usuario registrado";
                header('Location: index.php?controlador=controlador_login&accion=panel_administracion');
                exit();
               
            } else {
                echo "Error en el registro. Toca volver a intentarlo";
            }
        }
    }
    public function registroAdminJuegos()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            $perfil = "adminJuegos";

            //encriptacion de contraseña mediante password hash
            $contrasenaEncriptada = password_hash($contrasena, PASSWORD_DEFAULT);

            $exito = $this->modelo->registroAdminJuegos($correo, $contrasenaEncriptada, $perfil, $nombre);

            if ($exito) {
                echo "Administrador de juegos añadido";
                // Puedes redirigir a la página de inicio de sesión u otra vista según tus necesidades
            } else {
                echo "Error en el registro. Toca volver a intentarlo";
            }
        }
    }
}
?>
