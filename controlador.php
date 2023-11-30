<?php
require_once('ClasesDAO/Conexion.php');
require_once('ClasesDAO/Login.php');
require_once('ClasesDAO/ClienteDAO.php');
require_once('ClasesDAO/OperarioDAO.php');
require_once('ClasesDAO/Metodo_PagoDAO.php');
require_once('ClasesDAO/FondosDAO.php');
require_once('ClasesDAO/PlazasDAO.php');
require_once('ClasesDAO/NormatividadDAO.php');
require_once('ClasesDAO/VehiculosDAO.php');
require_once('ClasesDAO/RegistroDAO.php');
require_once('ClasesDAO/registrar_vehiculoDAO.php');
require_once('ClasesDAO/FacturaDAO.php');
$conex = Conexion::conexion();
$login = new Login();
$clientedao = new ClienteDAO();
$operariodao = new OperarioDAO();
$metodo_pagodao = new Metodo_PagoDAO();
$fondosdao = new FondosDAO();
$plazasdao = new PlazasDAO();
$normatividaddao = new NormatividadDAO();
$vehiculosdao = new VehiculosDAO();
$registrodao = new RegistrosDao();
$login = new Login();
$registro_vehiculodao = new registrar_vehiculoDAO();
$facturadao = new FacturaDAO();
?>

