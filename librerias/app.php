<?php
        
    class plantilla{
        private $v = array();
        private $i = array();

        function asignar($indice, $valor){
            $this->v[] = $valor;
            $this->i[] = '['.$indice.']';
        }

        function generar($archivo){
            $archivo = 'plantillas/'.$archivo.'.html';
            $html = file_get_contents($archivo);
            $html = str_replace($this->i, $this->v, $html);
            echo $html;
        }
    }

    function modelo($archivo, $datos = false){
        $dirarchivo = 'modelos/'.$archivo.'.php';
        if(file_exists($dirarchivo)){
            include($dirarchivo);
            return $archivo($datos);
        }else{
            die('<h1>El Modelo ('.$archivo.') no existe</h1>');

        }
        
    }
    

    // -------------------------------------------
    // -------------------------------------------


    function ruta($urlsimu = '', $archivo = false){
        if(preg_match('/^([\da-zA-Z\/\.\-\_\|]|(?:\{n\})|(?:\{t\}))+$/', $urlsimu)){
        $uri = $_SERVER['REQUEST_URI'];
        $buscar = array('/', '.', '-', '_', '|', '{n}', '{t}');
        $reempla = array('\/', '\.', '\-', '\_', '\|','(\d+)', '([a-zA-Z]+)');
        $expregto = str_replace($buscar ,$reempla, $urlsimu);
        if(preg_match_all('/^'.$expregto.'\/?(?:\?.+)?$/', $uri, $prarr)){
            foreach ($prarr as $key => $value) { $arr[] = $value[0]; }
            if(preg_match('/({.})+/',$urlsimu)){
                $uriarray = $arr;
                include('controles/'.$archivo.'.php');
                die();
            }else{
                include('controles/'.$archivo.'.php');
                die();
            }
        }else{
            return false;	
        }
        }else{
            return false;
        }
    }


?>