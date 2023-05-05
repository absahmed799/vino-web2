<section class="ajouter">

    <h1><span>Ajouter une bouteille au cellier </strong></span></h1>
    <div class="nouvelleBouteille" vertical layout>
        <form action="">
            <div class="input-box">
                <label> Recherche :
                    <input type="text" name="nom_bouteille">
                </label>
            </div>

            <p class="hidden name_bottle">Nom : <span data-id="" class="nom_bouteille"></span></p>


            <ul class="listeAutoComplete">

            </ul>

            <div class="input-box">
                <label> Millesime <span class="obligatoire">*</span> :
                    <input required type="number" name="millesime" >
                </label>

                <label> Quantite <span class="obligatoire">*</span>  :
                    <input required type="number" step="0" name="quantite" >
                </label>
            </div>

            <div class="input-box">
                <label> Date achat <span class="obligatoire">*</span> :
                    <input required type="date" name="date_achat">
                </label>

                <label> Prix <span class="obligatoire">*</span> :
                    <input required type="number" step="0.01" name="prix">
                </label>
            </div>

            <div class="input-box">
                <label> Garde <span class="obligatoire">*</span> :
                    <input required type="text" name="garde_jusqua">
                </label>

                <label> Notes <span class="obligatoire">*</span> :
                    <input required type="text" name="notes">
                </label>
            </div>
            <button name="ajouterBouteilleCellier" class="btn btnUpdate">Ajouter</button>
            <p class="obligatoire_champ"><span class="obligatoire">*</span>Champs Tous Obligatoires</p>
        </form>
    </div>
</section>
