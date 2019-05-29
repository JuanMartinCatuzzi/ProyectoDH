<?PHP
include_once "functions.php";
$ocupaciones=["Estudiante", "Empleada/o", "Desempleada/o", "Autónomo", "Jubilada/o"];
$errores=[];
$nameOK="";
$surnameOK="";
$emailOK="";
$ageOK="";

if ($_POST){
  $errores=ValidarDatos($_POST);
  $nameOK=trim($_POST["name"]);
  $surnameOK=trim($_POST["surname"]);
  $emailOK=trim($_POST["email"]);
  $ageOK=trim($_POST["age"]);
  if(empty($errores)){
    $usuario=ArmarUsuario();
    GuardarUsuario($usuario);
    LogearUsuario($emailOK);
  }
  if (UsuarioLogeado()) {
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
    <title>Bookish | Registrarse</title>
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
        <a href="login.php">LOG IN</a>
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
    <li class="menucorto dentrodemenu"> <a href="home.php"> <img class="logo" src="img/Bookish.png" alt=""> </a></li>
    <li class="menucorto header" id="chau"><a class="menucorto" href="login.php">LOG IN </a> / <a class="menucorto" href="home.php">HOME</a></li>
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
  <nav class="navigation">
    <ul>
      <li><a href="php/home.php"> Inicio /</a></li>
      <li><a href="login.php">Log in</a></li>
    </ul>
  </nav>
  <main>
    <section>
      <div class='formulario'>
          <form class='registro' action='register.php' method='post'>
            <div class='container'>
                <label for='name' >Nombre: </label>
                <?php if (isset($errores["name"])): ?>
                <input type="text" id="name" name="name" value="">
              <?php else : ?>
                <input type="text" name="name" id="name" value="<?= $nameOK?>">
              <?php endif; ?>
                <?php if (isset($errores["name"])):?>
                  <label class="error" for="name"><?=$errores["name"]?></label>
                <?php endif; ?>
            </div>
            <div class='container'>
                <label for='surname' >Apellido: </label>
                <?php if (isset($errores["surname"])): ?>
                <input type="text" id="surname" name="surname" value="">
              <?php else : ?>
                <input type="text" name="surname" id="surname" value="<?= $surnameOK?>">
              <?php endif; ?>
                <?php if (isset($errores["surname"])):?>
                  <label class="error" for="surname"><?=$errores["surname"]?></label>
                <?php endif; ?>
            </div>
            <div class='container'>
                <label for='email' >E-mail: </label>
                <?php if (isset($errores["email"])): ?>
                <input type="email" id="email" name="email" value="">
              <?php else : ?>
                <input type="email" name="email" id="email" value="<?= $emailOK?>">
              <?php endif; ?>
                <?php if (isset($errores["email"])):?>
                  <label class="error" for="email"><?=$errores["email"]?></label>
                <?php endif; ?>
            </div>
            <div class='container'>
                <label for='password' >Contraseña: </label>
                <input type='password' name='password' id='password' value=''/>
                <?php if (isset($errores["password"])):?>
                  <label class="error" for="password"><?=$errores["password"]?></label>
                <?php endif; ?>
            </div>
            <div class='container'>
                <label for='password-repeat' >Repetir contraseña: </label>
                <input type='password' name='password-repeat' id='password'/>
                <?php if (isset($errores["password-repeat"])):?>
                  <label class="error" for="password-repeat"><?=$errores["password-repeat"]?></label>
                <?php endif; ?>
            </div>
            <div class='container'>
                <label for='age' >Edad: </label>
                <?php if (isset($errores["age"])): ?>
                <input type="number" id="age" name="age" value="">
              <?php else : ?>
                <input type="number" name="age" id="age" value="<?= $ageOK?>">
              <?php endif; ?>
                <?php if (isset($errores["age"])):?>
                  <label class="error" for="age"><?=$errores["age"]?></label>
                <?php endif; ?>
            </div>
            <div class='container'>
                <label for='ocupacion' >Ocupación: </label>
                <select class="" name="ocupacion" id="ocupacion" >
                  <option value="" selected>Seleccionar</option>
                  <?php foreach ($ocupaciones as $key):?>
                    <option value="<?=$key ?>"><?=$key ?></option>
                  <?php endforeach; ?>
                </select>
                <?php if (isset($errores["ocupacion"])):?>
                  <label class="error" for="ocupacion"><?=$errores["ocupacion"]?></label>
                <?php endif; ?>
            </div>
            <input type='submit' name='Submit' value='Enviar' />
          </form>
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
