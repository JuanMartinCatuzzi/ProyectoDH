<?php
include_once "functions.php";
if (isset($_COOKIE["mantenerme"])) {
  LogearUsuario($_COOKIE["mantenerme"]);
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="css/estilos.css">
    <meta charset="utf-8">
    <title></title>
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
          <a href="login.php">LOG IN </a>
          <a href="#">PORQUE LEER CON BOOKISH</a>
          <a href="categorias.php">CATEGORIAS</a>
          <a href="#">QUIENES SOMOS</a>
        </div>
      </div>
    </div>
    <img src="img/Bookish.png" class="logo-mini" alt="">
</div>
<!--PRIMER FILA INCLUYENDO LOGO -->
    <ul class="listagrande-header">
      <li class="menucorto header" id="chau">PREGUNTAS FRECUENTES</li>
      <li class="menucorto dentrodemenu"> <a href="home.php"> <img class="logo" src="img/Bookish.png" alt=""></a></li>
      <li class="menucorto header" id="chau"> <?php if (!UsuarioLogeado()): ?> <a href="register.php" class="menucorto">REGISTRARSE </a> /
      <?php endif; ?> <?php if (!UsuarioLogeado()):?><a class="menucorto header" href="login.php"> LOG IN</a><?php else: ?> <a class="menucorto header" href="logout.php"> LOG OUT</a>
      <?php endif; ?> </li>
    </ul>

<!--SEGUNDA FILA INFLUYE MAS OPCIONES -->
    <ul class="bookish header" role="navigation">
        <li class="header"><i class="menulargo"></i>PORQUE LEER CON BOOKISH</li>
        <li class="header"><i class="menulargo"></i>|</li>
        <li class="header"><a href="categorias.php" class="menulargo header">CATEGORIAS</a></li>
        <li class="header"><i class="menulargo"></i>|</li>
        <li class="header"><i class="menulargo"></i>QUIENES SOMOS</li>
    </ul>
    </div>
    </header>
    <!-- MAIN -->
    <main class="home">
      <div class="imagen">
        <img src="img/bookish-02.jpg" alt="" class="cabeza">
        <?php if(UsuarioLogeado()):?>
          <?php $usuario=BuscarUsuario($_SESSION["email"]);  ?>
          <h2 class="bienvenido">¡Bienvenido, <?= $usuario["nombre"] ?>!</h2>
        <?php endif; ?>
      </div>
    <section class="productos">
        <div class="fondo-azul">

        </div>
        <div class="categorias">
          <div class="img primera">
            <img src="img/bookish-03.jpg" alt="" class="articulo">
          </div>
          <div class="img segunda">
            <img src="img/bookish-04.jpg" alt="" class="articulo">
          </div>
        </div>
      </section>
      <section class="interes">
        <h3 class="titulo">ARTICULOS DE INTERES</h3>
        <article class="articulos">
          <h4>TITULO</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <button type="button" name="button"class="boton">Seguir leyendo</button>
        </article>
        <article class="articulos">
          <h4>TITULO</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <button type="button" name="button" class="boton">Seguir leyendo</button>
        </article>
        <article class="articulos">
          <h4>TITULO</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <button type="button" name="button" class="boton">Seguir leyendo</button>
        </article>
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
