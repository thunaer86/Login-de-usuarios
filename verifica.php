<?php
//inicializamos la sesion o continuamos la sesión
session_start();
//comprueba si hay sesión iniciada o no, si la hay nos manda a index.php y sino a login.hrml
    if (!isset($_SESSION['sesion'])) {
        header('Location: login.html');
    }else{
        $fechaguardada = $_SESSION["ultmaconexion"];
        $ahora=time();
        $tiempo_transcurrido = $ahora-$fechaguardada;
        if($tiempo_transcurrido >= 600) {  
            //si pasan 10 minutos o m‡s  
            session_destroy(); // destruyo la sesi—n  
            header("Location: index.php"); //env’o al usuario a la pag. de autenticaci—n  
            //sino, actualizo la fecha de la sesi—n  
        }else {  
            $_SESSION["ultmaconexion"] = $ahora;  
        } 
    }