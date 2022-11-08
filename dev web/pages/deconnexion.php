<?php
require '../function/function.php';


session_start();
session_unset();
session_destroy();
$_SESSION['matricule'] = "";
if ($_SESSION['matricule'] == "") {
    header('location:connexion.php');
}


?>