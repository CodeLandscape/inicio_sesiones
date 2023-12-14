<?php
require_once("conexion.php");

class ModeloLogin extends Conexion {
    public function validarUsuario($correo, $contrasena) {
        $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
        $result = $this->conexion->query($sql);

        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();
            $contrasenaGuardada = $usuario['password'];

            // Verificar si la contraseña coincide utilizando password_verify
            if (password_verify($contrasena, $contrasenaGuardada)) {
                // La contraseña coincide, devuelve los detalles del usuario
                unset($usuario['password']); // No devolver la contraseña en la respuesta
                return $usuario;
            } else {
                // La contraseña no coincide
                return false;
            }
        } else {
            // No se encontró ningún usuario con el correo dado
            return false;
        }

        $this->conexion->close();
    }
}
?>
