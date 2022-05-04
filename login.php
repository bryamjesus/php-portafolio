<?php
session_start();
if($_POST){
    if( ($_POST['usuario']=='admin') && ($_POST['pass']=='admin')){
        $_SESSION['usuario']='admin';
        header("location:index.php"); #header es para reubicar
    }
    else{
        echo "<script> alert('Usuario y constraseña incorrecta')</script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">

            </div>

            <div class="col-md-4">
                <form action="login.php" method="post">
                    <div>
                        <label for="usuario">Usuario</label>
                        <input class="form-control" type="text" name="usuario" id="usuario">
                    </div>
                    <div>
                        <label for="pass">Contraseña</label>
                        <input class="form-control" type="password" name="pass" id="pass">
                    </div>
                    <button class="btn btn-success" type="submit">Entrar al portafolio</button>
                </form>
            </div>

            <div class="col-md-4">

            </div>
        </div>


    </div>


</body>

</html>