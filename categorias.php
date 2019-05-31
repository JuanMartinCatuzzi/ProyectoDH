<?php
include_once "functions.php";
if (isset($_COOKIE["mantenerme"])) {
  LogearUsuario($_COOKIE["mantenerme"]);
}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
     <link rel="stylesheet" href="css/estilos.css">
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
       <li class="menucorto dentrodemenu"> <a href="home.php"> <img class="logo" src="img/Bookish.png" alt=""></a></li>
       <li class="menucorto header" id="chau"> <?php if (!UsuarioLogeado()): ?> <a href="register.php" class="menucorto">REGISTRARSE </a> /
       <?php endif; ?> <?php if (!UsuarioLogeado()):?><a class="menucorto header" href="login.php"> LOG IN</a><?php else: ?> <a class="menucorto header" href="logout.php"> LOG OUT</a>
       <?php endif; ?> </li>
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
      <!-- Productos -->
      <section class="categorias">
        <h1 class="categorias">Categorías</h1>
      <article class="categoria">
      <img src="img/economia.jpg" class="imagen-articulo" alt="">
      <h3>Economia</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
      </article>

      <article class="categoria">
      <h3>Administración de Empresas</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
      </article>

      <article class="categoria">
      <h3>Psicología</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
      </article>

      <article class="categoria">
      <h3>Sociología</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
      </article>

      <article class="categoria">
      <h3>Computación</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
      </article>

      <article class="categoria">
      <h3>Literatura</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
      </article>

      <article class="categoria">
      <h3>Filosofía</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
      </article>

      <article class="categoria">
      <h3>Medicina</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
      </article>

      <article class="categoria">
      <h3>Poesía</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
      </article>

      </section>


      <!--Footer -->
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
