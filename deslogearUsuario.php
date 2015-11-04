<?php
session_start();

$_SESSION['logueado'] = NULL;
$_SESSION['tipo'] = NULL;

session_destroy();

?>