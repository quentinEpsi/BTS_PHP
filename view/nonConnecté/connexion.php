<?php require('navbar.php') ?>

    <div class="container">



        <form class="form_log" method="post" action="../../controller/nonConnecté/connexion.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Adresse email</label>
                <input type="email" class="form-control" placeholder="Votre email" name="mail">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mot de passe</label>
                <input type="password" class="form-control" placeholder="Mot de passe" name="mdp">
            </div>
            <button type="submit" class="btn btn-info">Connexion</button>
        </form>

    </div>



<?php require('footer.php');?>