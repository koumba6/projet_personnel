<?php
 
            // On détermine sur quelle page on se trouve
            if (isset($_GET['page']) && !empty($_GET['page'])) {
              $currentPage = (int) strip_tags($_GET['page']);
            } else {
              $currentPage = 1;
            }


            // On détermine le nombre total d'articles
            $sql = "SELECT COUNT(*) AS nb_user FROM user_web WHERE etat=1";

            // On prépare la requête
            $query = $db->prepare($sql);

            // On exécute
            $query->execute();

            // On récupère le nombre d'articles
            $result = $query->fetch();

            $user = (int) $result['nb_user'];

            // On détermine le nombre d'articles par page
            $parPage = 5;

            // On calcule le nombre de pages total
            $pages = ceil($user / $parPage);

            // Calcul du 1er article de la page
            $premier = ($currentPage * $parPage) - $parPage;
            $matricule = $_SESSION['matricule'];
            $sql = $db->prepare("SELECT * FROM user_web WHERE etat=1 and matricule != '$matricule'  LIMIT $premier, $parPage;");
            $sql->execute();



            ?>*/
  <nav>
              <ul class="pagination fixed-bottom justify-content-center">
                <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                  <a href="?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                </li>
                <?php for ($page = 1; $page <= $pages; $page++) : ?>
                  <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                  <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                    <a href="?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                  </li>
                <?php endfor ?>
                <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                  <a href="?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                </li>
              </ul>
            </nav>