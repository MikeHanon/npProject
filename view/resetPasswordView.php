<?php $title = 'Réinitialisation du mot de passe'; 
require_once './config/dbconfig.php';
?>

<?php ob_start(); ?>
<section>
    <section class="container">
        <section class="alert alert-success">
            <strong> Bonjour ! </strong><?=$rows['userName']?> vous êtes ici pour réinitialiser votre mot de passe oublié.
        </section>
        <form action="" method="post" class="form-signin">
            <h3 class="form-signin-heading">Réinitialisation du Mot de passe</h3>
            <?php
            if(isset($msg))
            {
                echo $msg;
            }
            ?>
            <input type="password" name="pass" id="" class="input-block-level" required />
            <input type="password" class="input-block-level" placeholder="Confirm New Password" name="confirm-pass" required />
      <hr />
        <button class="btn btn-large btn-primary" type="submit" name="btn-reset-pass">Réinitialiser votre mot de passe</button>
        </form>
    </section>
</section>
<?php $content = ob_get_clean(); ?>
        <?php require('template.php'); ?>