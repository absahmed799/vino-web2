<div class="ajouter">

    <div class="nouvelleBouteille" vertical layout>
        Recherche : <input type="text" name="nom_bouteille">
        <ul class="listeAutoComplete">

        </ul>
            <div >
                <p>Nom : <span data-id="" class="nom_bouteille"><?php echo $nom_bouteille ?></span></p>
                <p>Millesime : <input name="millesime" value="<?php echo  $bouteilleInfo[0]['millesime']  ?>"></p>
                <p>Quantite : <input name="quantite" value="<?php  echo $bouteilleInfo[0]['quantite']  ?>"></p>
                <p>Date achat : <input name="date_achat" value="<?php  echo $bouteilleInfo[0]['date_achat']  ?>"></p>
                <p>Prix : <input name="prix" value="<?php  echo $bouteilleInfo[0]['prix']  ?>"></p>
                <p>Garde : <input name="garde_jusqua" value="<?php echo  $bouteilleInfo[0]['garde_jusqua']  ?>"></p>
                <p>Notes <input name="notes" value="<?php echo  $bouteilleInfo[0]['notes']  ?>"></p>
                <input type="hidden" name="id" value="<?php echo  $bouteilleInfo[0]['id']  ?>">
            </div>
            <button name="modifierBouteilleCellier">Ajouter la bouteille (champs tous obligatoires)</button>
        </div>
    </div>
</div>