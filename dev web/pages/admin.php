<?php

 require '../function/function.php';
/*  $_SESSION['matricule']= $donnee["matricule"]; */
 if(isset($_SESSION['matricule'],$_SESSION['nom'],$_SESSION['prenom'])){
  
  $matricule = $_SESSION ['matricule'];
  $nom = $_SESSION ['nom'];
  $prenom = $_SESSION ['prenom'];
 }





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

<legend style="height: 20% ;" class="text-light d-flex justify-content-center bg-success">

              ESPACE ADMINISTRATEUR
  </legend>
 <p><?php  $matricule ?></p>

  <a href="archive.php"><button type="button" class="btn btn-dark mt-2" style="margin-left: 70%;">liste d'archive</button></a> 
<div class="container">
  <div  class="modif">
  <p><?=$_GET['modif'] ?? null?></p>
</div>
<div class="container " >

<div class="container">

  <div class="col-md-10">
    <div class="col-md-12">
     
    <table class="table m-2 mt-4" >
                <thead class="thead-dark bg-dark text-light">
                <tr>
                    <th scope="col">nom</th>
                    <th scope="col">prenom</th>
                    <th scope="col">matricule</th>
                    <th scope="col">email</th>
                    <th scope="col">role</th>
                    <th scope="col">Action</th>  
                </tr>
                </thead>
                <tbody>

              <?php
              
              $db= new PDO('mysql:host=127.0.0.1;dbname=dev_web;','root','');
                    $sql=$db->query('SELECT * FROM user_web WHERE  etat=1');

                    while($a = $sql->fetch()){
                        
                            echo ' <tr  scope="row">';
                                echo '<td>'.$a['nom'].'</td>';
                                echo '<td>'.$a['prenom'].'</td>';
                                echo '<td>'.$a['matricule'].'</td>';
                                echo '<td>'.$a['email'].'</td>';
                                echo '<td>'.$a['roles'].'</td>';
                                
                                
                                echo "<td>
                                <form action='archive.php' method='post'> 
                                <input type='hidden' name='id_em' value=".$a["id"].">
                                <button type='submit' class='btn btn-outline-danger'>archive</button>
                                </form>
                               
                                <form action='mod.php' method='post'>
                                <input type='hidden' name='nom_em' value=".$a["nom"].">
                                <input type='hidden' name='prenom_em' value=".$a["prenom"].">
                                <input type='hidden' name='email_em' value=".$a["email"].">
                                <input type='hidden' name='id_em' value=".$a["id"].">
                                <button type='submit' class='btn btn-outline-success'>edit</button>
                                </form>


                                <form action= 'switch.php' method= 'post'>
                                <button type='submit' class='btn btn-outline-primary'>switch</button>
                                <input type='hidden' name='id_em' value=".$a["id"].">
                                <input type='hidden' name='roles_em' value=".$a["roles"].">
                                
                                </form>
                                </td>";
                                
                                
                            echo '</tr>';
                    }
              
              ?>

                </tbody>
                </table>

    </div>
  </div>

</div>
</div>



</body>

</html>

































  <!-- <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
</body>
</html> -->