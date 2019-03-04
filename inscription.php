<!--header-->
<?php

// On inclus le fichier header.php sur la page
include(__DIR__.'./partials/header.php');
?>




<div class="container my-5">
    <h1 class="text-center">Inscription</h1>
    <div class="row">
        <div class="col-md-6 offset-3">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cfpassword">Confirmer le mot de passe</label>
                    <input type="password" name="cfpassword" id="cfpassword" class="form-control">
                </div>
                <button class="btn btn-primary">S'inscrire</button>
            </form>
        </div>
    </div>
</div>







<?php
  // On inclus le fichier footer.php sur la page

include(__DIR__.'./partials/footer.php');
?>