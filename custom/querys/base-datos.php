<?php
/*
CRUD con SQL Server y PHP
@author parzibyte [parzibyte.me/blog]
@date 2019-06-03
DB_CONNECTION_RE=sqlsrv5
DB_HOST_RE=200.66.68.173
DB_PORT_RE=1433
DB_DATABASE_RE=retos_especiales
DB_USERNAME_RE=latamti
DB_PASSWORD_RE=N1k3N$17!
================================
Este archivo se encarga de conectar a la base de datos
y traer un objeto PDO

Recuerda cambiar tus credenciales, y tal vez ponerlas en
un archivo env: https://parzibyte.me/blog/2018/06/30/leer-archivo-configuracion-ini-php/
================================
 */
$contraseña = "N1k3N$17!";
$usuario = "latamti";
$nombreBaseDeDatos = "retos_especiales";
# Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
$rutaServidor = "200.66.68.173";
try {
    $base_de_datos = new PDO("sqlsrv:server=$rutaServidor;database=$nombreBaseDeDatos", $usuario, $contraseña);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}
?>