<?php

 require '../function/function.php';

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
<legend class="text-light d-flex justify-content-center bg-success">ESPACE utilisateur</legend>

<!-- <a href="archive.php"><button type="button" class="btn btn-dark mt-2" style="margin-left: 70%;">liste d'archive</button></a> --> 
<div class="container">
<div  class="modif">
<p><?=$_GET['modif'] ?? null?></p>
</div>
<div class="container " >

<!-- <ul id="2" class="nav nav-pills nav-justified mt-4">
<li class="nav-item">
  <a href="#profile" data-target="#profile" data-toggle="pill" class="nav-link active show profile">
    <span>Actif</span>
  </a>
</li>
<li class="nav-item">
  <a href="#test" data-target="#test" data-toggle="pill" class="nav-link test">
    <span>Archive</span>
  </a>
</li>
</ul> -->

<div class="tab-content">

<div class="tab-pane active show" id="profile">
  <div class="col-md-12">
   
  <table class="table m-2 mt-4" >
              <thead class="thead-dark bg-dark text-light">
              <tr>
                  <th scope="col">nom</th>
                  <th scope="col">prenom</th>
                  <th scope="col">matricule</th>
                  <th scope="col">email</th>
                  <th scope="col">role</th>  
              </tr>
              </thead>
              <tbody>

            <?php
            
            $db= new PDO('mysql:host=127.0.0.1;dbname=dev_web;','root','');
                  $sql=$db->query('SELECT * FROM user_web WHERE roles ="user" and etat=0 ');

                  while($a = $sql->fetch()){
                      
                          echo ' <tr  scope="row">';
                              echo '<td>'.$a['nom'].'</td>';
                              echo '<td>'.$a['prenom'].'</td>';
                              echo '<td>'.$a['matricule'].'</td>';
                              echo '<td>'.$a['email'].'</td>';
                              echo '<td>'.$a['roles'].'</td>';

                  }
                              ?>

                </tbody>
                </table>

 </div>     
 </div> 
 </div>                       
                             
</body>
</html>