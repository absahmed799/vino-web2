<div class="cellier">
    <?php
    foreach ($data as $cle => $bouteille) {

    ?>
        <div class="bouteille" data-quantite="">
            <div class="img">
                <img src="<?php echo $bouteille['image'] ?>" height="100" width="100">
            </div>
            <div class="description">
                <p class="nom">Nom : <?php echo $bouteille['nom'] ?></p>
                <p class="quantite">Quantité : <span class="quantite-valeur"><?php echo $bouteille['quantite'] ?></span></p>
                <p class="pays">Pays : <?php echo $bouteille['pays'] ?></p>
                <p class="type">Type : <?php echo $bouteille['type'] ?></p>
                <p class="millesime">Millesime : <?php echo $bouteille['millesime'] ?></p>
                <p><a href="<?php echo $bouteille['url_saq'] ?>">🔗 Voir SAQ</a></p>
            </div>
            <div class="options" data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>">
                <a href="?requete=modifierBouteilleCellier&id=<?php echo $bouteille['id_bouteille_cellier'] ?>&nom=<?php echo $bouteille['nom'] ?>">✎ Modifier</a>
                <button class='btnAjouter' data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>" onclick="ajouterBouteilleQt(this)">+ Ajouter</button>
                <button class='btnBoire' data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>" onclick="boireBouteilleQt(this)">- Boire</button>

            </div>
        </div>
    <?php


    }

    ?>
</div>