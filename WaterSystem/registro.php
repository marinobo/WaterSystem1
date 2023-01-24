<?php
    require 'conexion.php';

    if (!$mysqli) {
        # code...
        die('NO SE PUEDE CONECTAR A BASE DE DATOS');
    }

    $usuario = utf8_decode($_POST['usuario']);
    $password = utf8_decode($_POST['pass']);
    $correo = utf8_decode($_POST['correo']);
    $telefono = utf8_decode($_POST['telefono']);
    $contodar =0;

    $pass_cifrado = password_hash($password, PASSWORD_DEFAULT);

    if (isset($_POST["btniniciar"])) {
        # code...
        if (password_verify($password, $query['pass'] )){
            $contodar++;
        }
        $query = mysqli_query($mysqli, "SELECT * FROM login WHERE usuario = '$usuario' AND pass = '$password'");
        $nr = mysqli_num_rows($query);
        if ($nr==1) {
            echo "<script> alert('Bienvenido: $usuario'); window.location='principal.html'</script>";
        }else {
            echo "<script> alert('El usuario no existe'); window.location='index.html'</script>";
        }
    }

    if (isset($_POST["submit"])) {
        # code...
        $sql = "INSERT INTO login (usuario, pass, correo, telefono) VALUES ('$usuario','$pass_cifrado','$correo','$telefono')";
        if (mysqli_query($mysqli, $sql)) {
            # code...
            echo "<script> alert('Usuario registrado con exito: $usuario'); window.location='principal.html'</script>";
        }else {
            echo "Error" .$sql."<br>".mysql_error($mysqli);
        }
    }
?>