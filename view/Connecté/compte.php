<?php
require ('navbar.php');
require ('../../controller/Connecté/compte.php')

?>

<?php if(isset($_GET['success']) && $_GET['success'] == 1) : ?>
<div class="container">
    <div class="alert alert-success" role="alert">
        User bien mis à jour
    </div>
</div>
<?php endif;?>

<div class="container">

    <div class="row">
        <div class="col-md-6 offset-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Information de votre compte :</span>
                <span class="badge badge-secondary badge-pill"></span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Nom : <?= $user['nom_user']?></h6>
                        <h6 class="my-0">Prénom : <?= $user['prenom_user']?></h6>
                    </div>
                    <span class="text-muted"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Adresse : <?= $user['adresse_user']?></h6>
                        <h6 class="my-0">Téléphone : <?= $user['tel_user']?></h6>
                    </div>
                    <span class="text-muted"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">E-Mail : <?= $user['mail_user']?></h6>
                        <h6 class="my-0">Date de Naissance : <?= date($user['naissance_user'])?></h6>
                    </div>
                    <span class="text-muted"></span>
                </li>

                <li class="list-group-item d-flex justify-content-between">
                    <span>Votre Solde : </span>
                    <strong><?= $user['solde_user']?> jetons</strong>
                </li>
            </ul>
            <a href="modifCompte.php?action=voirMonCompte&amp;id=<?= $user['id_user'];?>" class="btn btn-primary">Modifier votre compte</a>
            <button type="button" class="btn btn-danger">Supprimer votre Compte</button>
        </div>
    </div>
<div class="row">
    <div class="col-md-6 offset-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Créditez votre compte</span>
            <span class="badge badge-secondary badge-pill"></span>
        </h4>
    <form action="../../controller/Connecté/compte.php?action=addJeton&amp;id=<?= $user['id_user']?>" method="post">
        <div class="input-group-prepend">
            <input type="number" class="form-control input-solde" name="solde">
            <button type="submit" class="btn btn-success">Créditer  <i class="fas fa-euro-sign"></i> </button>
        </div>
    </form>
    </div>
</div>








</div>

</div>

<?php
require ('footer.php'); ?>