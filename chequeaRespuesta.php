<?php
    include('misfunciones.php');
    $mysqli = conectaBBDD();

    $respuesta = $_POST['respuesta'];
    $numeroPregunta = $_POST['numeroPregunta'];
    /////////query terrible no copuar (copiar = suspenso )
   // $consulta = $mysqli -> query("SELECT * FROM `preguntas` WHERE numero='$numeroPregunta' ");
    //$r = $consulta -> fetch_array();
    $consulta = $mysqli -> prepare("SELECT correcta FROM `preguntas` WHERE numero= ? ");
    $consulta -> bind_param ("s",$numeroPregunta);
    $consulta -> execute();
    $consulta -> store_result();
    $consulta -> bind_result ($correcta);
    $consulta -> fetch();
    if($correcta==$respuesta){
        echo 'ACERTASTE!!!';
    }
    else
    {
        echo 'incorrecta looser!!!';
    }
?>