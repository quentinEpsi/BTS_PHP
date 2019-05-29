<?php require('navbar.php') ?>


    <div class="container">




        <form class="form_log" method="post" action="../../controller/nonConnecté/inscription.php">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Nom</label>
                    <input type="text" class="form-control" placeholder="Nom" name="nom" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Prénom</label>
                    <input type="text" class="form-control" placeholder="Prenom" name="prenom" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress">Adresse</label>
                    <input type="text" class="form-control"  placeholder="Votre adresse.." name="adresse" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputZip">Téléphone</label>
                    <input type="text" class="form-control" placeholder="06 xx xx xx xx" name="tel" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputZip">Date de naissance</label>
                    <input type="date" class="form-control" placeholder="jj/mm/aaaa" name="dateNaiss" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control"  placeholder="Email" name="mail" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Mot de passe</label>
                    <input type="password" class="form-control"  placeholder="Password" name="mdp" required>
                </div>
            </div>


            <button type="submit" class="btn btn-info">Inscription</button>
        </form>


    </div>



<?php require('footer.php');?>