
<?php

$formato = array('.jpg','.png','.doc','.xlsx');
$directorio = "archivos";
$contadorArchivos =0;
if(isset($_POST['boton'])){

  $nombreArchivos =$_FILES['archivo']['name'];
  $nombreTempArchivos =$_FILES['archivo']['tmp_name'];
  $ext = substr($nombreArchivos,strrpos($nombreArchivos, '.'));

  //if(in_array($ext,$formato)){

    if(move_uploaded_file($nombreTempArchivos,"archivos/$nombreArchivos")){
      echo "Felicidades,  achivo  $nombreArchivos  subido exitosamente";

    }else {
      echo "Ocurrio un error";
    }
    /*
  }else{
    echo "Archivo no permitido";
  }*/

}

 ?>



<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Como subir un archivo y mostrar contenido de directorio PHP</title>
    <meta description="Como subir y mostrar achivo de directorio en PHP"/>
    <link rel="stylesheet" href="estilo.css">
  </head>
  <body>

      <div id="caja">
        <h1>Archivos existentes en el directorio</h1>
        <?php
            if($dir= opendir($directorio)){

              while ($archivo = readdir($dir)) {

                if($archivo != '.' && $archivo != '..'){
                $contadorArchivos ++;

                echo "Archivo: <a href='#' onclick='javaScript:descargar(this)'  >$archivo</a></br>";

                }
              }
              echo "Total de Archivos: <strong>$contadorArchivos</strong>";

            }
        ?>


      </div>

      <div id="caja">
        <form class="multipart/form-data" action="descargar.php" method="post">
              <h1>Descargar Archivo</h1>
              <input type="submit" name="btn_descargar" value="Descargar">
        </form>
      </div>

      <div id="caja">


        <form method="post" action="" enctype="multipart/form-data">
          <h1>Subiendo Archivo</h1>
          <input type="file" id="arch" name="archivo" /><br/>
          <input type="submit" name="boton" value="Subir Archivo">

        </form>

      </div>
      <script type="text/javascript">

        function descargar(valor) {

          console.log(valor.innerHTML);
        }
      </script>
    <div id=tw"">Correo: jhonathamcast@gmail.com</div>
  </body>
</html>
