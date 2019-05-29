<?php
require 'navbar.php';
require '../../controller/Connecté/ventes.php';?>
<div class="container">

    <a type="button" class="btn btn-success" href="addProduit.php">Vendre un produit</a>
    <h1>Ventes en cours :</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Produit</th>

            <th scope="col">Prix</th>

            <th scope="col"></th>

        </tr>
        </thead>
        <tbody>
        <?php while ($vc = $ventesEnCours->fetch()){?>
            <tr>
                <th><?= $vc['nom_produit'] ?></th>
                <td><?= $vc['prix_produit'] ?> Jetons</td>
                <td> <a href="../../controller/Connecté/ventes.php?action=supprimerProduit&amp;idProduit=<?= $vc['id_produit']?>"><span class="text-danger">Supprimer produit</span></a> </td>


            </tr>
        <?php } ?>
        </tbody>
    </table>

</div>

<div class="container">
    <h1>Ventes en attente de confirmation :</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Produit</th>
            <th scope="col">ID acheteur</th>
            <th scope="col"> </th>
            <th scope="col"> </th>
        </tr>
        </thead>
        <tbody>
        <?php while ($va = $ventesAttentes->fetch()){?>
            <tr>
                <th scope="row"><?= $va['nom_produit'] ?></th>
                <td><?= $va['id_user'] ?></td>
                <td><a type="button" class="btn btn-success" href="../../controller/Connecté/propositionAchat.php?action=accepter&amp;idProduit=<?= $va['id_produit'] ?>&amp;idUser=<?= $va['id_user'] ?>">Confirmer la vente</a></td>
                <td><a type="button" class="btn btn-danger" href="../../controller/Connecté/propositionAchat.php?action=refuser&amp;idProduit=<?= $va['id_produit'] ?>&idUser=<?= $va['id_user'] ?>">Refuser la vente</a></td>

            </tr>
        <?php } ?>
        </tbody>
    </table>

</div>

<div class="container">
    <h1>Historique des ventes :</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Produit</th>
            <th scope="col">Prix</th>
            <th scope="col">Date confirmation</th>

        </tr>
        </thead>
        <tbody>
        <?php while ($vh = $ventesHistoriques->fetch()){?>
            <tr>
                <th scope="row"><?= $vh['nom_produit'] ?></th>
                <td><?= $vh['prix_produit'] ?> €</td>
                <td><?= $vh['date_confirmation_transaction'] ?></td>

            </tr>
        <?php } ?>
        </tbody>
    </table>

</div>
<?php require 'footer.php';?>
