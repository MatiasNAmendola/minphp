<?php
	// -----------------------------------------------------------
	// Proyecto Framework para la web
	// Copyright - 2013
	// -----------------------------------------------------------
    
    // Inicializamos la aplicación
    include('librerias/app.php');
    session_start();
    // ----------------------------------------
	
	// Declaramos las urls si una se cumple las demas no se siguen comprobando
    ruta('/portada', 'portada');
    ruta('/', 'principal');
    ruta('/xa/login','logeo_usuario');

    // Si no se cumple ninguna ruta
    // muestra el error 404
    include('publico/404.html');

?>