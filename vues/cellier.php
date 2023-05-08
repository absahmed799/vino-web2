<section class="cellier" id="cellier">
    <div class="bouteille-cellier">

        <?php

        foreach ($data as $cle => $bouteille) {

        ?>
            <div class="bouteille" data-quantite="">
                <div class="head-card">
                    <h2 class="nom">
                        <?php echo $bouteille['nom'] ?>
                    </h2>
                </div>

                <div class="body-card">
                    <div class="img">
                        <img src="<?php echo $bouteille['image'] ?>" height="100" width="100">
                    </div>
                    <div class="">
                        <div class="description">
                            <p class="nom">Nom : <?php echo $bouteille['nom'] ?></p>
                            <p class="quantite">Quantité : <span class="quantite-valeur"><?php echo $bouteille['quantite'] ?></span></p>
                            <p class="pays">Pays : <?php echo $bouteille['pays'] ?></p>
                            <p class="type">Type : <?php echo $bouteille['type'] ?></p>
                            <p class="millesime">Millesime : <?php echo $bouteille['millesime'] ?></p>
                            <p><a href="<?php echo $bouteille['url_saq'] ?>">🔗 Voir SAQ</a></p>
                        </div>
                    </div>
                </div>

                <div class="footer-card">
                    <div class="options" data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>">
                        <a class="btn btn-modifier" href="?requete=modifierBouteilleCellier&id=<?php echo $bouteille['id_bouteille_cellier'] ?>&nom=<?php echo $bouteille['nom'] ?>">✎ Modifier</a>
                        <button class='btn btnAjouter btnCustom' data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>">+ Ajouter</button>
                        <button class='btn btnBoire' data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>">- Boire</button>

                    </div>
                </div>
            </div>
        <?php


        }

        ?>
    </div>

</section>