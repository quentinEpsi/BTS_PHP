<?php
require ('navbar.php');
require ('../../controller/Connecté/ventes.php');
?>
<div class="container">
    <form class="form_log" method="post" action="../../controller/Connecté/ventes.php?action=addProduit&amp;id=<?= $_SESSION['id_user'];?>" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Etat du Produit</label>
                <input type="text" class="form-control" placeholder="Etat de votre produit" name="etat_produit" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Prix du Produit</label>
                <input type="text" class="form-control" placeholder="Prix de votre produit" name="prix_produit" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="exempleTextarea">Description du produit</label>
                <textarea class="form-control" id="exempleTextarea" placeholder="Décrivez votre produit" name="description_produit" rows="3" required> </textarea>
            </div>
            <div class="form-group col-md-3">
                <label for="nom">Nom du Produit</label>
                <input type="text" class="form-control" placeholder="Nom de votre produit" name="nom_produit" required id="nom">
            </div>
            <div class="form-group col-md-3">
                <label for="Select1">Choisir la catégorie</label>
                <select name = "categorie" class="form-control" id="Select1" required>
                    <?php while ($categorie = $categories->fetch())
                    {
                        ?> <option value="<?= $categorie['id_categorie'];?>"><?= $categorie['nom_categorie'];?></option> <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="Select2">Choisir la marque</label>
                <select name = "marque" class="form-control" id="Select2" required>
                    <?php while ($marque = $marques->fetch())
                    {
                        ?> <option value="<?= $marque['id_marque'];?>"><?= $marque['nom_marque'];?></option> <?php
                    }
                    ?>
            </div>
            <div class="form-group col-md-6">
                <label for="image">Choisir une image pour votre produit </label>
                <input type="file" class="form-control"  placeholder="Choisir l'image" name="image_produit" >
            </div>
        </div>


        <button type="submit" class="btn btn-info">Ajouter un produit</button>
    </form>


</div>
<?php require ('footer.php');?>
