<?php
class Conexion extends PDO
{
    private $usuario = "root";
    private $contra = "";
    private $db = "softbrain";
    private $host = "localhost";
    
    public function __construct()
    {
        try {
            // Establecer la conexión con la base de datos utilizando PDO
            parent::__construct("mysql:host=$this->host;dbname=$this->db;charset=utf8", $this->usuario, $this->contra);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            exit;
        }
    }

    // Función para realizar el inicio de sesión de un usuario
    public function login($correoUsuario, $passUsuario)
    {
        $sql = "SELECT * FROM usuarios WHERE correo = :correoUsuario AND contra = :passUsuario";
        $consulta = $this->prepare($sql);
        $consulta->bindParam(':correoUsuario', $correoUsuario);
        $consulta->bindParam(':passUsuario', $passUsuario);
        $consulta->execute();
        
        $row = $consulta->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return $row; // Devuelve los datos del usuario si las credenciales son correctas
        } else {
            return false; // Si las credenciales son incorrectas, devuelve false
        }
    }

    public function correoExistente($correoUsuario)
{
    $sql = "SELECT correo FROM usuarios WHERE correo = :correoUsuario";
    $consulta = $this->prepare($sql);
    $consulta->bindParam(':correoUsuario', $correoUsuario);
    $consulta->execute();
    
    $row = $consulta->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        return true; // El correo ya existe en la base de datos
    } else {
        return false; // El correo no existe en la base de datos
    }
}

    // Función para registrar un nuevo usuario
    public function register($correoUsuario, $passUsuario)
    {
        // Verifica si los datos requeridos están presentes
        if (empty($correoUsuario) || empty($passUsuario)) {
            return false;
        }
    
        $sql = "INSERT INTO usuarios (correo, contra) VALUES (:correoUsuario, :passUsuario)";
        $consulta = $this->prepare($sql);
        $consulta->bindParam(':correoUsuario', $correoUsuario);
        $consulta->bindParam(':passUsuario', $passUsuario);
        $resultado = $consulta->execute();
    
        if ($resultado) {
            return $this->lastInsertId(); // Devuelve el ID del usuario registrado
        } else {
            return false; // Si hubo un error en la inserción, devuelve false
        }
    }

    public function ingresarcotizacion($nombreContacto, $empresa, $pais, $telefono, $correo, $descripcion, $tipoproyecto, $presupuesto, $sitiowebempresa)
{
    // Verifica si los datos requeridos están presentes
    if (empty($nombreContacto) || empty($empresa) || empty($pais) || empty($telefono) || empty($correo) || empty($descripcion) || empty($tipoproyecto)) {
        return false;
    }

    $sql = "INSERT INTO cotizaciones (nombreContacto, empresa, pais, telefono, correo, descripcion, tipoproyecto, presupuesto, sitiowebempresa) 
            VALUES (:nombreContacto, :empresa, :pais, :telefono, :correo, :descripcion, :tipoproyecto, :presupuesto, :sitiowebempresa)";
    $consulta = $this->prepare($sql);
    $consulta->bindParam(':nombreContacto', $nombreContacto);
    $consulta->bindParam(':empresa', $empresa);
    $consulta->bindParam(':pais', $pais);
    $consulta->bindParam(':telefono', $telefono);
    $consulta->bindParam(':correo', $correo);
    $consulta->bindParam(':descripcion', $descripcion);
    $consulta->bindParam(':tipoproyecto', $tipoproyecto);
    $consulta->bindParam(':presupuesto', $presupuesto);
    $consulta->bindParam(':sitiowebempresa', $sitiowebempresa);
    $resultado = $consulta->execute();

    if ($resultado) {
        return $this->lastInsertId(); // Devuelve el ID de la cotización insertada
    } else {
        return false; // Si hubo un error en la inserción, devuelve false
    }
}

}
