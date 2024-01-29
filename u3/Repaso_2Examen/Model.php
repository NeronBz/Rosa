<?php
require_once 'Producto.php';
require_once 'ProductoEnCesta.php';
require_once 'Tienda.php';
class Model
{
    private string $url = 'mysql:host=localhost;port=3306;dbname=mcdaw';
    private string $us = 'root';
    private string $ps = '';

    private $conexion = null;

    function __construct()
    {
        try {
            $this->conexion = new PDO($this->url, $this->us, $this->ps);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function obtenerProductos()
    {
        $resultado = array();
        try {
            $consulta = $this->conexion->query("select * from producto");
            if ($consulta->execute()) {
                while ($fila = $consulta->fetch()) {
                    $producto = new Producto($fila["codigo"], $fila["nombre"], $fila["precio"]);
                    $resultado[] = $producto;
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }

    function obtenerProducto($id)
    {
        $resultado = null;
        try {
            $consulta = $this->conexion->prepare('select * from producto where codigo=?');
            $params = array($id);
            if ($consulta->execute($params)) {
                //Ver si se ha devuelto 1 registro con el usuario
                if ($fila = $consulta->fetch()) {
                    //Se ha encontrado el usuario
                    $resultado = new Producto($fila['codigo'], $fila['nombre'], $fila['precio']);
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }

    function obtenerTiendas()
    {
        $resultado = array();
        try {
            $consulta = $this->conexion->query("select * from tienda");
            if ($consulta->execute()) {
                while ($fila = $consulta->fetch()) {
                    $tienda = new Tienda($fila["codigo"], $fila["nombre"], $fila["telefono"]);
                    $resultado[] = $tienda;
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }

    function obtenerTienda($id)
    {
        $resultado = null;
        try {
            $consulta = $this->conexion->prepare('select * from tienda where codigo=?');
            $params = array($id);
            if ($consulta->execute($params)) {
                //Ver si se ha devuelto 1 registro con el usuario
                if ($fila = $consulta->fetch()) {
                    //Se ha encontrado el usuario
                    $resultado = new Tienda($fila['codigo'], $fila['nombre'], $fila['telefono']);
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }

    /**
     * Get the value of conexion
     */
    public function getConexion()
    {
        return $this->conexion;
    }

    /**
     * Set the value of conexion
     *
     * @return  self
     */
    public function setConexion($conexion)
    {
        $this->conexion = $conexion;

        return $this;
    }
}