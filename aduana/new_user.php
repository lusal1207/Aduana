<?php
$servidor="localhost";
$usuario="root";
$pass="";
$base="aduasala";
$conexion= mysqli_connect($servidor,$usuario, $pass, $base);
if(isset($_POST['guardar'])){
    if(!$conexion){
      echo "ERROR EN LA CONEXION CON LA BASE DE DATOS ";
      }
      else{
        $user=$_POST['user'];
        $contra=$_POST['contra'];
        $consu= "INSERT INTO usuarios(user,pass) VALUES('$user','$contra')";
        $execute= mysqli_query($conexion,$consu);

      }

}
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <center>
     <form method="POST" action="new_user.php">
       <label> USUARIO </label> <BR>
         <input type=text name="user" value=""><br>
         <label> CONTRASEÑA </label> <br>
           <input type=text name="contra" value=""> <br>
       <button type="submit" name="guardar"> GUARDAR </BUTTON>
     </form>
   </center>
   </body>
 </html>
