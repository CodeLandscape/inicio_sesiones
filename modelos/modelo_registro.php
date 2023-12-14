<?php
require_once("conexion.php");

class ModeloRegistro extends Conexion
{
    public function registrarSuperAdmin($correo, $contrasena, $perfil, $nombre)
    {
        $stmt = $this->conexion->prepare("INSERT INTO usuarios (correo, password, perfil, nombre) VALUES (?, ?, ?, ?)");

        // Verificar si la preparación de la consulta fue exitosa
        if ($stmt) {
            // Vincular parámetros y ejecutar la consulta
            $stmt->bind_param("ssss", $correo, $contrasena, $perfil, $nombre);
            $result = $stmt->execute();

            $stmt->close();
            $this->conexion->close();

            return $result;
        } else {
            // Manejar el error en la preparación de la consulta
            return false;
        }
    }

    public function verificarSuperAdmin()
    {
        $sql = "SELECT COUNT(*) as count_admin FROM usuarios WHERE perfil = 'admin'";
        $result = $this->conexion->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $count = $row['count_admin'];

            // Si hay al menos un SuperAdmin registrado, devuelve true
            return $count > 0;
        } else {
            // Si hay algún error o no hay registros, devuelve false
            return false;
        }
    }

    public function registroAdminJuegos($correo, $contrasena, $perfil, $nombre)
    {
        $stmt = $this->conexion->prepare("INSERT INTO usuarios (correo, password, perfil, nombre) VALUES (?, ?, ?, ?)");

        // Verificar si la preparación de la consulta fue exitosa
        if ($stmt) {
            // Vincular parámetros y ejecutar la consulta
            $stmt->bind_param("ssss", $correo, $contrasena, $perfil, $nombre);
            $result = $stmt->execute();

            $stmt->close();
            $this->conexion->close();

            return $result;
        } else {
            // Manejar el error en la preparación de la consulta
            return false;
        }
    }
}
