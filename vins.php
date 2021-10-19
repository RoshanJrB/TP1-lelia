<?php
  $page = 'vins';

  // Inclure l'entête
  include('inclusions/entete.php');

  // Inclure la librairie 'citations'
  include('lib/citations.lib.php');
  // Obtenir une citation aléatoire
  $citation = citationAleatoire($langueChoisie, 'vins');
  
  // Gestion de l'affichage dynamique de la carte des vins
  //Inclure la librairie 'articles'
  include('lib/articles.lib.php');
  // obtenir le tableau des vins
  $vinsTableau = retournerArticle($langueChoisie, $page);
?>
    <div class="contenu-principal">
      <div class="citation">
        <img src="images/vins-citation.png" alt="">
        <blockquote>
          <?= $citation['texte']; ?>
          <cite>- <?= $citation['auteur']; ?></cite>
        </blockquote>
      </div>
      <form class="frm-recherche">
        <label><?= $vin_frmEtiquette; ?>
          <input type="text" name="origine" placeholder="<?= $vin_frmPlaceholder; ?>">
        </label>
      </form>
      <div class="carte">
        <!-- Boucle pour générer dynamiquement les sections de la carte des vins -->
        <?php foreach($vinsTableau as $titreSection => $vinsSection) : ?>
        <section>
          <h2><?= $titreSection; ?></h2>
          <ul>
            <!-- Boucle pour générer dynamiquement les vins dans la section de la carte courante -->
            <?php foreach($vinsSection as $vin) : ?>
            <li>
              <span>
                <span class="vin-nom"><?= $vin['nom']; ?></span><br>
                <b class="vin-provenance">[<?= $vin['provenance']; ?>]</b>
                <i class="vin-desc"><?= $vin['description']; ?></i>
              </span>
              <span class="prix"><?= $vin['prix']; ?></span>
            </li>
            <?php endforeach; ?>
            <!-- Fin de la boucle des vins d'une section -->
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