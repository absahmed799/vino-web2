<div class="ajouter section" id="valideAjout">

    <div class="nouvelleBouteille" vertical layout>
        <strong>Recherche : </strong><input type="text" name="nom_bouteille" value="">
        <ul class="listeAutoComplete">

        </ul>
        <p data-js-nom>Nom : <!-- <input data-id="" class="nom_bouteille" type="text" name="nom_bouteille" placeholder="Nom de la bouteille" disabled> -->
                 <strong><span data-id="" class="nom_bouteille"></span></strong>
            </p>
        <div class="input-box">
            <p>Millesime (année): <input type="number" name="millesime" placeholder="1900"></p>
            <p>Quantite : <input type="number" min="1" name="quantite" value="1"></p>
            <p>Date achat : <input type="date" name="date_achat"></p>
            <p>Prix ($) : <input type="number" min="0" step="0.01" name="prix" placeholder="0.00"></p>
            <p>Garde (année): <input type="number" name="garde_jusqua" placeholder="2025"></p>
            <p>Notes :<input type="text" placeholder="Commentaire..." name="notes"></p>
        </div>
        <button name="ajouterBouteilleCellier" class="btn btnCustom">Ajouter la bouteille (champs obligatoires)</button>
    </div>
</div>
</div>