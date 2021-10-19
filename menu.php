<?php
  $page = 'menu';

  // Inclure l'entête
  include('inclusions/entete.php');

  // Inclure la librairie 'citations'
  include('lib/citations.lib.php');
  // Obtenir une citation aléatoire
  $citation = citationAleatoire($langueChoisie, 'menu');
  
  // Gestion de l'affichage dynamique du menu
  // inclure la librairie 'articles'
  include('lib/articles.lib.php');
  //Obtenir le tableau des menus
  $menuTableau = retournerArticle($langueChoisie, $page);
?>
    <div class="contenu-principal">
      <div class="citation">
        <img src="images/menu-citation.jpg" alt="">
        <blockquote>
          <?= $citation['texte']; ?>
          <cite>- <?= $citation['auteur']; ?></cite>
        </blockquote>
      </div>
      <div class="carte">

        <!-- Boucle pour générer dynamiquement les sections du menu -->
        <?php foreach($menuTableau as $titreSection => $platsSection) : ?>
        <section>
          <h2><?= $titreSection; ?></h2>
          <ul>

            <!-- Boucle pour générer dynamiquement les plats dans la section de menu courante -->
            <?php foreach($platsSection as $plat) : ?>
              <li>
                <?php if($plat['desc'] != null) : ?>
                <span><?= $plat['nom']; ?><br><i><?= $plat['desc']; ?></i></span>
                <?php else: ?>
                <span><?= $plat['nom']; ?></span>
                <?php endif;?>
                <?php if($plat['portion'] == 2) : ?>
                <span class="prix"><i class="article-menu-portion">(<?= $plat['portion'].
                                    ' '.$mnu_portion; ?>)</i><?= $plat['prix']; ?></span>
                <?php else: ?>
                <span class="prix"><?= $plat['prix']; ?></span>
                <?php endif; ?>
              </li>
            <?php endforeach; ?>
            <!-- Fin de la boucle des plats d'une section -->

          </ul>
        </section>
        <?php endforeach; ?>
        <!-- Fin de la boucle des sections -->

      </div>
    </div>
<?php
  // Inclure le pied de page
  include('inclusions/pied2page.php');
?>