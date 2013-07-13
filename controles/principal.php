<?php
	
	if(isset($_SESSION['usuario'])){
		header('location:/portada');
	}else{


	modelo('usuarios');

	// Generar el html de la vista
    $plantilla = new plantilla;
    $plantilla->asignar('titulo', 'Kiin - Recuerda ese dia');
    $plantilla->asignar('hola', 'Funciona');
    $plantilla->generar('principal');

    }
?>