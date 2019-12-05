<?php
$title = 'inscription'
?>
<?php ob_start(); ?>
<section id="login">
    <section class="container">
    <?php if(isset($msg)) echo $msg;  ?>
      <form class="form-group" method="post">
        <h2 class="form-group-heading">Sign Up</h2><hr />
        <label for="txtuname">Pseudo</label>
        <input type="text" class="form-control"  name="txtuname" required />
        <label for="txtemail">E-mail</label>
        <input type="email" class="form-control"  name="txtemail" required />
        <label for="txtpass">Mot de passe</label>
        <input type="password" class="form-control"  name="txtpass" required />
        <label for="role">Vendeur/Acheteur</label>
        <select name="role" id="role" class="form-control">
            <option value="2">Vendeur</option>
            <option value="3">Acheteur</option>
        </select>
      <hr />
        <button class="btn btn-large btn-primary mb-5" type="submit" name="btn-signup">Sign Up</button>
        <a href="index.php" style="float:right;" class="btn btn-large">Sign In</a>
      </form>

    </section> <!-- /container -->
   
  </section>

<?php $content = ob_get_clean(); ?>
        <?php require('template.php'); ?>