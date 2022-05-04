<?php include('cabecera.php') ?>
<?php include('conexion.php') ?>

<?php

if ($_POST) {
    //print_r($_POST);
    $nombre= $_POST['nombre'];
    $descripcion= $_POST['descripcion'];

    $fecha = new DateTime();

    $imagen =$fecha->getTimestamp()."_".$_FILES['archivo']['name'];
    $imagen_temporal = $_FILES['archivo']['tmp_name'];
    move_uploaded_file($imagen_temporal, "img/".$imagen);

    $obj_conexion = new conexion();
    $sql = "INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL,'$nombre', '$imagen', '$descripcion')";
    $obj_conexion->ejecutar($sql);
    header("location:portafolio.php");
}

if($_GET){
    //DELETE FROM `proyectos` WHERE `proyectos`.`id` = 8
    $id = $_GET['borrar'];
    $obj_conexion = new conexion();
    $imagen = $obj_conexion->consultar("SELECT imagen from `proyectos` WHERE id=".$id);

    unlink("img/".$imagen[0]['imagen']); #nos sirve para realizar un borrado
    $sql ="DELETE FROM `proyectos` WHERE `proyectos`.`id` =".$id;
    $obj_conexion->ejecutar($sql);
    header("location:portafolio.php");
}

$obj_conexion = new conexion();
$proyectos = $obj_conexion->consultar("SELECT * FROM `proyectos`");

//print_r($resultado);

?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Datos del proyecto
                </div>
                <div class="card-body">
                    <form action="portafolio.php" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="nombre">Nombre del proyecto</label>
                            <input required class="form-control" type="text" name="nombre" id="nombre">
                        </div>
                        <div>
                            <label for="img">Imagen del proyecto</label>
                            <input required class="form-control" type="file" name="archivo" id="img">
                        </div>
                        <div>
                            <label for="txt">Descripción:</label>
                            <textarea required class="form-control" name="descripcion" id="" rows="3"></textarea>
                        </div>
                        <div>
                            <input class="btn btn-success" type="submit" value="Enviar Proyecto">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($proyectos as $proyecto){ ?>
                    <tr>
                        <td><?php echo $proyecto['id']; ?></td>
                        <td><?php echo $proyecto['nombre']; ?></td>
                        <td>
                            <img width="100" src="img/<?php echo $proyecto['imagen']; ?>" alt="">
                        </td>
                        <td><?php echo $proyecto['descripcion']; ?></td>
                        <td><a class="btn btn-danger" href="?borrar=<?php echo $proyecto['id'] ?>">Eliminar</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>




<?php include('pie.php') ?>