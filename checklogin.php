<?php
//inicializamos la sesion o continuamos la sesión
session_start();
include("config.php"); // Este es un archivo donde ponemos la configuraci—n de la base de datos
include("conexion.php"); // En este conectamos con la base de datos.

$username=mysql_real_escape_string($_POST['login']); // Metemos lo que se nos ha pasado en el formulario a variables
$password=md5(mysql_real_escape_string($_POST['password'])); //mysql_real_escape_string es una funcion para impedir la inyecci—n SQL
//hacemos una consulta a la base de datos para comprobar si existen o no esos datos
$sentencia="SELECT * FROM usuario WHERE login COLLATE utf8_bin='$username' AND contra='$password' LIMIT 0,1"; //login COLLATE utf8_bin es para distinguir entre mayusculas y minusculas
	$rslt=mysql_query($sentencia);  
	$num=mysql_fetch_array($rslt); //Metemos el resultado en un Array

//si la consulta no nos devuelve ningún registro nos manda a login.html y sino nos va al index.php
if ($num==0){
            ?> <script> var variablejs = 1 ; </script> <?php // ponemos la variable 1 
            
            echo "Usuario o contrase&ntilde;a inv&aacute;lida.";
	    
}else{
	$_SESSION["sesion"] = $num["identificador_usuario"];
	$_SESSION["ultmaconexion"]=time(); //Control para el tiempo de sesi—n.
	?> <script> var variablejs = 0 ; </script> <?php
}
?>