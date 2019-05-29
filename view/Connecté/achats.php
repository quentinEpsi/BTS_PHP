<?php require 'navbar.php'?>

<?php require '../../controller/Connecté/achats.php'?>

<div class="container">
    <h1>Mes achats :</h1>

    <h2>Achats en attente de validation :</h2>
    <table class="table table-striped">
        <thead>
        <tr>

            <th scope="col">Produit</th>
            <th scope="col">Prix</th>
            <th scope="col">Date demande d'achat</th>


        </tr>
        </thead>
        <tbody>
        <?php while ($aa = $achatAttentes->fetch()){?>
            <tr>
                <th scope="row"><?= $aa['nom_produit'] ?></th>
                <td><?= $aa['prix_produit'] ?></td>
                <td><?= $aa['date_proposition_achat'] ?></td>

            </tr>
        <?php } ?>
        </tbody>
    </table>

    <h2>Historique des achats :</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Produit</th>
            <th scope="col">Prix</th>

        </tr>
        </thead>
        <tbody>
        <?php while ($ah = $achatHistoriques->fetch()){?>
            <tr>
                <th scope="row"><?= $ah['nom_produit'] ?></th>
                <td><?= $ah['prix_produit'] ?> €</td>


            </tr>
        <?php } ?>
        </tbody>
    </table>



</div>
<?php require 'footer.php'?>
