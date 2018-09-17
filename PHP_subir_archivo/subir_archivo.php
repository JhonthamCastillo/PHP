<?php

    foreach ($_FILES["archivo_fls"] as $clave => $valor) {
      //echo "Propiedades: $clave --- Valor: $valor<br/>";

    }

    $archivo = $_FILES["archivo_fls"] ["tmp_name"]; //el temporal lo guardaras en la varialble archivo

    $destino = "archivos/".$_FILES["archivo_fls"]["name"];

    //para subir un tipo de archivo en especifico

    if($_FILES["archivo_fls"]["type"]=="text/plain"){
      move_uploaded_file($archivo,$destino);
      echo "Archivo subido";
    }else{
       echo "Solo se admiten archivos de tipo plano <br /><a href=\"enviar_archivo.php\">REGRESAR</a>";
    }





 ?>
