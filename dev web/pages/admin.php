<?php
session_start();
require '../function/function.php';
/* $_SESSION['matricule']= $donnee["matricule"]; 
 if(isset($_SESSION['matricule'],$_SESSION['nom'],$_SESSION['prenom'])){
  
  $matricule = $_SESSION ['matricule'];
  $nom = $_SESSION ['nom'];
  $prenom = $_SESSION ['prenom'];
 } */





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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Document</title>
</head>

<body>
  <div class="text-light  p-3  bg-success">


    <div class="d-flex justify-content-center h1"> Espace admin</div>


    <img class="rounded-circle" src="data:image/jpg;base64, <?= base64_encode($_SESSION['photo']) ?>" alt="photo" style="width: 100px; height:100px;">
    <span><?= $_SESSION['matricule'] ?? null ?></span>
    <span><?= $_SESSION['nom'] ?? null ?></span>&nbsp;
    <span><?= $_SESSION['prenom'] ?? null ?></span>
    <a href="deconnexion.php" style="float:right;font: size 20px;">
      <svg width="40" height="30" viewBox="0 0 40 30" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M38.8374 16.5008C39.7923 15.6707 39.7923 14.3227 38.8374 13.4926L29.0596 4.99258C28.1048 4.1625 26.5541 4.1625 25.5992 4.99258C24.6443 5.82266 24.6443 7.1707 25.5992 8.00078L31.2061 12.875H15.111C13.7589 12.875 12.6666 13.8246 12.6666 15C12.6666 16.1754 13.7589 17.125 15.111 17.125H31.2061L25.5992 21.9992C24.6443 22.8293 24.6443 24.1773 25.5992 25.0074C26.5541 25.8375 28.1048 25.8375 29.0596 25.0074L38.8374 16.5074V16.5008ZM12.6666 4.375C14.0186 4.375 15.111 3.42539 15.111 2.25C15.111 1.07461 14.0186 0.125 12.6666 0.125H7.77767C3.72906 0.125 0.444336 2.98047 0.444336 6.5V23.5C0.444336 27.0195 3.72906 29.875 7.77767 29.875H12.6666C14.0186 29.875 15.111 28.9254 15.111 27.75C15.111 26.5746 14.0186 25.625 12.6666 25.625H7.77767C6.42559 25.625 5.33322 24.6754 5.33322 23.5V6.5C5.33322 5.32461 6.42559 4.375 7.77767 4.375H12.6666Z" fill="black" />
      </svg>


    </a>


  </div>

  <a href="archive.php"><button type="button" class="btn btn-dark mt-2" style="margin-left: 70%;">liste d'archive</button></a>

  <div class="container">

    <div class="modif">
      <p><?= $_GET['modif'] ?? null ?></p>
    </div>
    <div class="container ">

      <div class="container">

        <div class="col-md-10">
          <div class="col-md-12">

            <table class="table m-2 mt-4">
              <div class="col-lg-5 mt-5 " style="margin-left :10px;">
                <form method="post" action="">
                  <input class="form-control me-2 " type="search" name="recherche" style="width: 20rem;" placeholder="Search" aria-label="Search">
                  <!-- <button></button>  -->

                </form>

              </div>

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

                $db = new PDO('mysql:host=127.0.0.1;dbname=dev_web;', 'root', '');


                if (isset($_POST['recherche']) && ($_POST['recherche'] != '')) {
                  $retour = "<a href=\"admin.php\" style=\"margin-left :800px;\">Retour</a>";
                  $matricule = $_POST['recherche'];
                  $sql = $db->query("SELECT * FROM user_web WHERE  etat=1 AND matricule LIKE '%$matricule%' ");

                  while ($a = $sql->fetch()) {


                    echo ' <tr  scope="row">';
                    echo '<td>' . $a['nom'] . '</td>';
                    echo '<td>' . $a['prenom'] . '</td>';
                    echo '<td>' . $a['matricule'] . '</td>';
                    echo '<td>' . $a['email'] . '</td>';
                    echo '<td>' . $a['roles'] . '</td>';


                    echo "<td> ";
                    echo '<div style="display: flex "; >';
                    echo "  <form action='archive.php' method='post'> 
                          <input type='hidden' name='id_em' value=" . $a["id"] . ">
                          <button title='archiver' type='submit' class='btn btn-outline-danger'>archive</button>
                          </form>
                         
                          <form action='mod.php' method='post'>
                          <input type='hidden' name='nom_em' value=" . $a["nom"] . ">
                          <input type='hidden' name='prenom_em' value=" . $a["prenom"] . ">
                          <input type='hidden' name='email_em' value=" . $a["email"] . ">
                          <input type='hidden' name='id_em' value=" . $a["id"] . ">
                          <button title='modifier' type='submit' class='btn btn-outline-success'>edit</button>
                          </form>


                          <form action= 'switch.php' method= 'post'>
                          <button title='switcher' type='submit' class='btn btn-outline-primary'>switch</button>
                          <input type='hidden' name='id_em' value=" . $a["id"] . ">
                          <input type='hidden' name='roles_em' value=" . $a["roles"] . ">
                          
                          </form>
                          </div>
                          </td>";


                    echo '</tr>';
                  }
                } else {

                  $currentPage = 1;
                  if (isset($_GET['page'])){
                    $currentPage = $_GET['page'];
                  }
                  // On d??termine le nombre total d'articles
                  $sql = "SELECT COUNT(*) AS nb_user FROM user_web WHERE etat=1";

                  // On pr??pare la requ??te
                  $query = $db->prepare($sql);

                  // On ex??cute
                  $query->execute();

                  // On r??cup??re le nombre d'articles
                  $result = $query->fetch();

                  $user = (int) $result['nb_user'];

                  // On d??termine le nombre d'articles par page
                  $parPage = 5;

                  // On calcule le nombre de pages total
                  $pages = ceil($user / $parPage);

                  // Calcul du 1er article de la page
                  $premier = ($currentPage * $parPage) - $parPage;
                  $matricule = $_SESSION['matricule'];
                  $sql = $db->prepare("SELECT * FROM user_web WHERE etat=1 and matricule != '$matricule'  LIMIT $premier, $parPage");
                  $sql->execute(); 


                  /* $sql = $db->query('SELECT * FROM user_web WHERE  etat=1'); */
                  while ($a = $sql->fetch()) {
                    if (isset($_SESSION['matricule'])) {
                      $matSession = $_SESSION['matricule'];
                      $mat = $a['matricule'];
                    }

                    if ($mat != $matSession) {
                      echo ' <tr  scope="row">';
                      echo '<td>' . $a['nom'] . '</td>';
                      echo '<td>' . $a['prenom'] . '</td>';
                      echo '<td>' . $a['matricule'] . '</td>';
                      echo '<td>' . $a['email'] . '</td>';
                      echo '<td>' . $a['roles'] . '</td>';


                      echo "<td> ";
                      echo '<div style="display: flex "; >';
                      echo "  <form action='archive.php' method='post'> 
                                <input type='hidden' name='id_em' value=" . $a["id"] . ">
                                <button title='archiver' type='submit' class='btn btn-outline-danger'>archive</button>
                                </form>
                               
                                <form action='mod.php' method='post'>
                                <input type='hidden' name='nom_em' value=" . $a["nom"] . ">
                                <input type='hidden' name='prenom_em' value=" . $a["prenom"] . ">
                                <input type='hidden' name='email_em' value=" . $a["email"] . ">
                                <input type='hidden' name='id_em' value=" . $a["id"] . ">
                                <button title='modifier' type='submit' class='btn btn-outline-success'>edit</button>
                                </form>


                                <form action= 'switch.php' method= 'post'>
                                <button title='switcher' type='submit' class='btn btn-outline-primary'>switch</button>
                                <input type='hidden' name='id_em' value=" . $a["id"] . ">
                                <input type='hidden' name='roles_em' value=" . $a["roles"] . ">
                                
                                </form>
                                </div>
                                </td>";


                      echo '</tr>';
                    }
                  }
                }
                ?>
                <?php
                if (isset($retour)) {
                  echo $retour;
                }
                ?>

              </tbody>
            </table>


           
        
            <nav>
              <ul class="pagination fixed-bottom justify-content-center">
                <!-- Lien vers la page pr??c??dente (d??sactiv?? si on se trouve sur la 1??re page) -->
                <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                  <a href="?page=<?= $currentPage - 1 ?>" class="page-link">Pr??c??dente</a>
                </li>
                <?php for ($page = 1; $page <= $pages; $page++) : ?>
                  <!-- Lien vers chacune des pages (activ?? si on se trouve sur la page correspondante) -->
                  <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                    <a href="admin.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                  </li>
                <?php endfor ?>
                <!-- Lien vers la page suivante (d??sactiv?? si on se trouve sur la derni??re page) -->
                <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                  <a href="?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                </li>
              </ul>
            </nav>

          </div>





        </div>
      </div>

    </div>
  </div> 



</body>

</html>