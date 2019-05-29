<?php
require 'navbar.php';
require '../../controller/Connecté/accueil.php'
;?>


<div class="container">

    <div class="row">

        <div class="col-lg-12">

            <div class="card mt-4" style="width: 400px; height: 100%">
                <img class="card-img-top img-fluid" src="../../img/<?= $produit['image_produit']?>" alt="" >
                <div class="card-body">
                    <h3 class="card-title"><?= $produit['nom_produit'] ?></h3>
                    <h4><?= $produit['prix_produit'] ?> jetons</h4>
                    <p class="card-text"><?= $produit['description_produit'] ?></p>
                    <a href="../../controller/Connecté/propositionAchat.php?action=proposition&amp;idProduit=<?= $produit['id_produit']?>&amp;idUser=<?= $_SESSION['id_user']?>" class="btn btn-success">Effectuer une demande d'achat</a>
                </div>
            </div>
            <!-- /.card -->


            <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

    </div>

</div>
<!-- /.container -->


<?php require 'footer.php';?>
