<?PHP
include "init.php";
$errores=[];
$emailOK="";

if ($auth->UsuarioLogeado()) {
  header("Location:home.php");
  exit;
}

if ($_POST){
  $errores=Validador::ValidarLogin($_POST);
  $emailOK=$_POST["email"];
  if (empty($errores)){
    $auth->LogearUsuario($_POST["email"]);
    header("Location:home.php");
    exit;
  }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Bookish | Login</title>
</head>
<body>
  <header>
    <div class="header-entero">
    <!--Menu con icono -->
    <div class="header-container">
  <div class="navbar">
    <div class="dropdown">
      <button class="dropbtn" id="action" href="action">
      <i class="fa fa-ellipsis-v"></i>
      </button>
      <div id="action"class="dropdown-content">
        <a href="#">PREGUNTAS FRECUENTES</a>
        <a href="register.php">REGISTRARSE</a>
        <a href="#">PORQUE LEER CON BOOKISH</a>
        <a href="#">CATEGORIAS</a>
        <a href="#">QUIENES SOMOS</a>
      </div>
    </div>
  </div>
  <img src="img/Bookish.png" class="logo-mini" alt="">
  </div>
  <!--PRIMER FILA INCLUYENDO LOGO -->
  <ul class="listagrande-header">
    <li class="menucorto header" id="chau">PREGUNTAS FRECUENTES</li>
    <li class="menucorto dentrodemenu"> <a href="home.php"> <img class="logo" src="img/Bookish.png" alt=""></a> </li>
    <li class="menucorto header" id="chau"><a class="menucorto" href="register.php">REGISTRARSE </a>/<a class="menucorto" href="home.php">HOME</a></li>
  </ul>

  <!--SEGUNDA FILA INFLUYE MAS OPCIONES -->
  <ul class="bookish header" role="navigation">
      <li class="header"><i class="menulargo"></i>PORQUE LEER CON BOOKISH</li>
      <li class="header"><i class="menulargo"></i>|</li>
      <li class="header"><i class="menulargo"></i>CATEGORIAS</li>
      <li class="header"><i class="menulargo"></i>|</li>
      <li class="header"><i class="menulargo"></i>QUIENES SOMOS</li>
  </ul>
</div>
</header>
  <main>
    <section>
    <div class='formulario'>
        <form class='login' action='login.php' method='post'>
          <h3>Ingrese Usuario y Contraseña para continuar:</h3>
          <div class='container'>
              <label for='email' >E-mail: </label>
              <?php if(isset($errores["email"])): ?>
              <input type='email' name='email' id='email' value=''/>
            <?php else: ?>
              <input type="email" name="email" value="<?= $emailOK?>">
            <?php endif; ?>
              <?php if (isset($errores["email"])): ?>
                <label for="email" class="error"><?= $errores["email"] ?></label>
              <?php endif; ?>
          </div>
          <div class='container'>
              <label for='password' >Contraseña: </label>
              <input type='password' name='password' id='password' value=''/>
              <?php if (isset($errores["password"])): ?>
                <label for="password" class="error"><?= $errores["password"] ?></label>
              <?php endif; ?>
          </div>
          <div class="container">
              <label class="mantener" for="mantener"> Mantenerme Logueado </label>
              <input type="checkbox" name="mantener" value="">
          </div>
          <div class="container">
          <button type='submit' name='Submit' value='Entrar'>Entrar </button>
          </div>
          <div class="olvide">
          <a  class="olvide"href="#">Olvidé mi Contraseña</a>
        </div>
        </form>
        </div>
    </div>
  </section>
  <section>
    <h3 class="ingrese">O ingrese con:</h3>
    <ul class="ingrese">
      <li class="ingrese"><i class="fab fa-google social"></i></li>
      <li class="ingrese"><i class="fab fa-facebook social"></i></li>
      <li class="ingrese"><i class="fab fa-twitter-square social"></i></li>
    </ul>
  </section>
  </main>
  <footer>
    <div class="flex-container">
      <ul class="listagrande">
        <li class="menucortobold">CONTACTO</li>
        <li class="menucortomini">BOOKISH.LIBROS@GMAIL.COM</li>
        <li class="menucortomini">+54 9 11 56541925</li>
        <li class="menucortobold">SEGUINOS EN @BOOKISH.LIBROS</li>
      </ul>
      <div class="data"><img class="data" src="img/bookish-05.jpg" alt="">
      </div>
    </div>
  </footer>
</body>
</html>
