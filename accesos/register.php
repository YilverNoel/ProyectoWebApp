<?php 
session_start();
require('../conexion.php');

if (!empty($_POST['email']) && !empty($_POST['password'])){
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm_pass=$_POST['confirm_pass'];
    $tele=$_POST['telefono'];
    $sexo=$_POST['sexo'];
    $mensaje='';

    if ($password == $confirm_pass) {
        $query = "INSERT INTO peluqueria.cliente (tipo_usuario,clave,nombre_cliente,apellido_cliente,telefono,sexo,email) VALUES ('2','$password','$nombre','$apellido','$tele', '$sexo','$email')";
        $resultado=pg_query($conn, $query);
    
        if (!$resultado) {
            $message = ' :( Lo siento tenemos un problema con sus credenciales';
            
        }else{
            $_SESSION['messag']='Registro existoso!, puedes iniciar Sesión';
            $_SESSION['message_typ']='success';
            header('location:../index.php');
        }

    }else{
  
        $_SESSION['messag']='Contraseñas no coinciden';
        $_SESSION['message_typ']='danger';
        header('location:../index.php');
   }

}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-light">
        <?php if(!empty($message)): ?>
             <p class="mensaje"> <?= $message ?></p>
         <?php endif; ?>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header  text-white bg-dark"><h3 class="text-center font-weight-light my-4"><i class="fas fa-user-edit mr-2"></i>Crear Usuario</h3></div>
                                    <div class="card-body">
                                        <form action="./register.php" method="POST">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputFirstName">Primer Nombre</label><input class="form-control py-4" id="inputFirstName" name="nombre" type="text" placeholder="Ingrese su nombre" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputLastName">Apellidos</label><input class="form-control py-4" id="inputLastName" name="apellido" type="text" placeholder="Ingrese su apellido" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputTelephone">Telefono</label><input class="form-control py-4" id="inputTelephone" name="telefono" type="numeric" placeholder="Ingrese su telefono" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputTelephone">Sexo</label><select class="form-control form-control" placeholder="Selecciona el sexo" name="sexo"><option>--Selecciona el sexo--</option><option>M</option><option>F</option></select></div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-2"><label class="small mb-1" for="inputEmailAddress">Email</label><input class="form-control py-4" id="inputEmailAddress" name="email" type="email" aria-describedby="emailHelp" placeholder="Ingrese su email" /></div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Ingrese la constraseña" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputConfirmPassword">Confirmar Password</label><input class="form-control py-4" id="inputConfirmPassword" name="confirm_pass" type="password" placeholder="Confirme su contraseña" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0"><input class="btn btn-success btn-block" type="submit" value="Crear Cuenta"></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="../index.php">Ya tienes una cuenta? vamos al Login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Tecnosan 2021 Ocaña</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
