<?php
    require_once("dll/connection.php");
  
    session_start();

    if(isset($_POST["login"])){

    if(!empty($_POST['username']) && !empty($_POST['password'])){
        $username=$_POST['username'];
        $password=$_POST['password'];

    $query = $connection->prepare("SELECT * FROM users WHERE USERNAME=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();

    $result= $query-> fetch(PDO::FETCH_ASSOC);
    if (!$result){
        echo '<p class="error">La combinación del usuario y la contraseña son inválidos!</p>';
    }else{
        if (password_verify($password, $result['password'])){
            $_SESSION['session_username']=$username;
            /*Redirect browser*/
            header("Location: intropage.php");
        } //cierre de if password verify
        else{
            $message = "Nombre de usuario o contraseña invalida!";
         } //Fin del Else
        }//Fin del Else
     } else{
        $message= "Todos los campos son requeridos!";
        }
    }

?>
    <div class="containermlogin">
        <div id="login">
        <link rel="stylesheet" type="text/css" href="<?php echo $urlSitio;?>styles/stylelog.css">
            <form name="loginform" id="loginform" method="POST" autocomplete="off">
                <h1>Autenticación de Usuario</h1>
                <p>
                    <label for="user_login">Nombre Usuario<br />
                    <input type="text" name="username" id="username" class="input" value ="" size="20" /></label>
                </p>
            
                <p>
                    <label for="user_pass">Contraseña<br />
                    <input type="password" name="password" id="password" class="input" value ="" size="20"  /></label>
                </p>
            <p class = "submit">
                <input type="submit" name="login" class="button" value ="Ingresar" />
            </p>
            
            <p class="regtext">No estas registrado? <a href="register.php">Registrate Aquí</a>!</p> 
        </form>
        </div>
    </div>

    <?php if (!empty($message)) {echo "<p class=\"error\">"."MESSAGE: ".$message . "</p>";} ?>
    