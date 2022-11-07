<?php
require '../function/function.php';


if(isset($_POST['id_em'],$_POST['roles_em'])){

$id= $_POST['id_em'];
$roles= $_POST['roles_em'];

/* echo $roles;
echo $id; */
$requeste = new WebUSER();
 $requeste->switcher($roles, $id);


}


?>