<section class="modifier">

    <h1><span><strong><?php echo $bouteille['nom'] ?></strong></span></h1>

    <div class="nouvelleBouteille" vertical layout>
        
        <form action="?requete=miseAjourBouteilleCellier&id=<?php echo $data['id'] ?>" method="POST">
            <div class="input-box">
                <label> Millesime <span class="obligatoire">*</span> :
                    <input required type="number" name="millesime" value="<?php echo $data['millesime'] ?>">
                </label>

                <label> Quantite <span class="obligatoire">*</span>  :
                    <input required type="number" name="quantite" step="0"  value="<?php echo $data['quantite'] ?>">
                </label>
            </div>

            <div class="input-box">
                <label> Date achat <span class="obligatoire">*</span> :
                    <input required type="date" name="date_achat" value="<?php echo $data['date_achat'] ?>">
                </label>

                <label> Prix <span class="obligatoire">*</span> :
                    <input required type="number" step="0.01" name="prix" value="<?php echo $data['prix'] ?>">
                </label>
            </div>

            <div class="input-box">
                <label> Garde <span class="obligatoire">*</span> :
                    <input required type="text" name="garde_jusqua" value="<?php echo $data['garde_jusqua'] ?>">
                </label>

                <label> Notes <span class="obligatoire">*</span> :
                    <input required type="text" name="notes" value="<?php echo $data['notes'] ?>">
                </label>
            </div>

            <button type="submit" name="modifierBouteilleCellier" class="btn btnUpdate">Enregistrer</button>
            <p class="obligatoire_champ"><span class="obligatoire">*</span> Sont obligatoires</p>
        </form>
    </div>
</section>