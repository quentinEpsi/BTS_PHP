

<?php require ('navbar.php')?>
<?php require ('../../controller/Connecté/accueil.php')?>


<?php $_SESSION['id_user'] = (int)$user['id_user']; ?>
<?php $_SESSION['nom_user'] = $user['nom_user']; ?>
<?php $_SESSION['prenom_user'] = $user['prenom_user']; ?>
<?php $_SESSION['solde_user'] = $user['solde_user']; ?>



<div class="container">

    <form class="form_index" method="post" action="../../controller/Connecté/accueil.php?action=rechercher">

        <h1>Trouvez un produit : </h1>
        <div class="form-row">
            <!-- <div class="form-group col-md-6">
                <inut type="search" class="form-control" name="nom_produit" placeholder="Nom produit" >
            </div> -->
            <div class="form-group col-md-3">
                <select id="inputState" class="form-control" name="categorie">
                    <option selected disabled>Catégories : </option>
                    <?php while ($categorie = $categories->fetch()){ ?>

                    <option value="<?= $categorie['id_categorie'] ?>"><?= $categorie['nom_categorie'] ?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <select id="inputState" class="form-control" name="marque">
                    <option selected disabled>Marques : </option>
                    <?php while ($marque = $marques->fetch()){?>
                        <option value="<?= $marque['id_marque'] ?>"><?= $marque['nom_marque'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-info">Rechercher </button>


    </form>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <?php while ($produit = $produits->fetch()){ ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="produit.php?action=voirProduit&amp;idProduit=<?= $produit['id_produit']?>"><img class="card-img-top" src="../../img/<?= $produit['image_produit'] ?> " alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="produit.php?action=voirProduit&amp;idProduit=<?= $produit['id_produit']?>"><?= $produit['nom_produit']?></a>
                                </h4>

                                <p class="card-text"><?= $produit['description_produit'] ?> </p>
                            </div>
                            <div class="card-footer">
                                <h5><?= $produit['prix_produit'] ?> jetons </h5>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>

    </div>
</div>










<?php require ('footer.php');?>