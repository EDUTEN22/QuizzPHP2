<?php
$tema = $_POST['tema'];

include('misfunciones.php');
$mysqli = conectaBBDD();

?>
<div class="alert alert-success" role="alert">
  El tema que has elegido es <?php echo $tema;?>
</div>
<?php
$consulta = $mysqli -> query("SELECT * FROM `preguntas` WHERE `tema`='$tema' ORDER BY RAND() LIMIT 1");
$r = $consulta -> fetch_array();



?>
<div class="container">
    <div class="row">
        
        <div class="col-12">
            <button class="btn btn-warning disabled col-12">
                <?php echo $r['enunciado']; ?>
            </button>
            <br><br>
            <button class="btn btn-primary col-12"  onClick="chequeaRespuesta('1','<?php echo $r['numero']; ?>');" >
                <?php echo $r['r1']; ?>
            </button>
            <…
[6:33 p. m., 4/4/2022] AlvaroPeman: <?php
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