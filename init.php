<?php
include "clases/usuario.php";
include "clases/db.php";
include "clases/dbMySql.php";
include "clases/dbJson.php";
include "clases/validador.php";
include "clases/auth.php";

$dbAll = new DbJson; //En caso de usar json cambiar por new DbJson
$auth = new Auth;
