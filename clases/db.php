<?php

abstract class Db
{
  public abstract function GuardarUsuario(Usuario $usuario); //No ovlidar parámetros. También se heredan
  public abstract function BuscarUsuario($email);
  public abstract function ExisteUsuario($email);
  public abstract function UsuarioLogeado();

}
