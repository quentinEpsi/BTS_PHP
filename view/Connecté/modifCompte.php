<?php
require('navbar.php');
require ('../../controller/Connecté/compte.php');


?>
    <div class="container">

        <form class="form_log" method="post" action="../../controller/Connecté/compte.php?action=modifCompte&amp;id=<?= $user['id_user']?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Nom</label>
                    <input type="text" class="form-control" placeholder="Nom" name="nom" required value="<?= $user['nom_user'];?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Prénom</label>
                    <input type="text" class="form-control" placeholder="Prenom" name="prenom" required value="<?= $user['prenom_user'];?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress">Adresse</label>
                    <input type="text" class="form-control"  placeholder="Votre adresse.." name="adresse" value="<?= $user['adresse_user'];?>" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputZip">Téléphone</label>
                    <input type="text" class="form-control" placeholder="06 xx xx xx xx" name="tel" value="<?= $user['tel_user']?>" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputZip">Date de naissance</label>
                    <input type="date" class="form-control" placeholder="jj/mm/aaaa" name="dateNaiss" required value="<?= $user['naissance_user']?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control"  placeholder="Email" name="mail" required value="<?= $user['mail_user']?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Mot de passe</label>
                    <input type="password" class="form-control"  placeholder="Password" name="mdp" required value="<?= $user['mdp_user']?>">
                </div>
            </div>


            <button type="submit" class="btn btn-info">Modifier</button>
        </form>


    </div>

<?php require ('footer.php');