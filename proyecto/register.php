<?php
require_once("dll/connection.php");

session_start();

if (isset($_POST["register"])) {
if (!empty($_POST['fullname'])&&!empty($_POST['email'])&&!empty($_POST['username'])&&!empty($_POST['password'])) {
    $full_name = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $query = $connection->prepare("SELECT * FROM users WHERE EMAIL =:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query ->execute();

    if ($query->rowCount() >0) {
        echo '<p class= "error> El email se encuentra registrado</p>';
    }
    if ($query->rowCount() ==0) {
       $query = $connection-> prepare("INSERT INTO users(FULLNAME,USERNAME,PASSWORD,EMAIL) VALUES(:fullname,:username,:password_hash,:email)");
       $query-> bindParam("fullname", $full_name, PDO::PARAM_STR);
       $query->bindParam("username", $username, PDO::PARAM_STR);
       $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
       $query->bindParam("email", $email, PDO::PARAM_STR);
       $result = $query-> execute();


       if ($result) {
           $message = "Cuenta Creada";
       }else {
           $message = "Error al ingresar información";
       }
    }else {
        $message = "El nombre del usuario ya existe! Por favor intenta con otro";
    }
}else {
    $message = "Todos lo campos no deben estar vacíos";
}

}

?>
<?php if (!empty($message)) {echo"<p class = \"error\">" . "Mensaje: ". $message . "</p>";}?>

<div class="container mregister">
    <div id="login">
        <h1>Registrar</h1>
        <form name="registerform"  id="registerform" action="register.php" method="post">
            <p>
                <label for="user_login">Nombre Completo<br />
                <input type="text" name="fullname" id="fullname" class="input" size="32" value ="" /></label>
            </p>

            <p>
                <label for="user_pass">Email<br />
                <input type="email" name="email" id="email" class="input" size="32" value ="" /></label>
            </p>

            <p>
                <label for="user_pass">Nombre Usuario<br />
                <input type="text" name="username" id="username" class="input" size="20" value ="" /></label>
            </p>

            <p>
                <label for="user_pass">Contraseña<br />
                <input type="password" name="password" id="password" class="input" size="32" value ="" /></label>
            </p>

            <p class = "submit">
             <input type="submit" name="register" id="register" class="button" value ="Registrar" />
            </p>

            <p class="regtext">Ya tienes cuenta? <a href="login.php">Entra Aquí</a>!</p>
        </form>
    </div>
</div>
