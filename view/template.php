<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- fontawesome css -->
   <link rel="stylesheet" href="./css/font-awesome.min.css">
   <!--bootstrap css-->
   <link rel="stylesheet" href="./css/bootstrap.min.css">
   <!--animate css-->
   <link rel="stylesheet" href="./css/animate-wow.css">
   <!--main css-->
   <link rel="stylesheet" href="./css/style.css">
   <link rel="stylesheet" href="./css/bootstrap-select.min.css">
   <link rel="stylesheet" href="./css/slick.min.css">
   <!--responsive css-->
   <link rel="stylesheet" href="./css/responsive.css">
   <title><?=
               isset($title) ? $title . ' E-Artisanat' : 'E-Artisanat, revalorisont l\'artisanat'
            ?></title>
</head>

<body>
   <header id="header" class="top-head">
      <!-- Static navbar -->
      <nav class="navbar navbar-default">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-4 col-sm-12 left-rs">
                  <div class="navbar-header">
                     <button type="button" id="top-menu" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                     </button>
                     <a href="index.php" class="navbar-brand"><img src="images/logo.png" alt="" /></a>
                  </div>
                  <?php if (isset($_SESSION['userName'])) { ?>
                     <form action ="index.php?action=search" method="GET" class="navbar-form navbar-left web-sh">
                        <div class="form">
                           <input type="hidden" name="action" value="search">
                           <input name="search" type="text" class="form-control" placeholder="">
                           <!-- <button name="btn-search" type="submit">chercher</button> -->
                        </div>
                     </form>
               </div>

               <div class="col-md-8 col-sm-12">
                  <div class="right-nav">
                     <div class="login-sr">
                        <div class="login-signup">
                           <ul>
                              <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    category
                                 </a>
                                 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="index.php?action=category&id=1">Alimentation</a>
                                    <a class="dropdown-item" href="index.php?action=category&id=2">Batiment</a>
                                    <a class="dropdown-item" href="index.php?action=category&id=3">Fabrication</a>
                                    <a class="dropdown-item" href="index.php?action=category&id=4">Service</a>
                                 </div>
                              </li>
                              <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Profile
                                 </a>
                                 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="index.php?action=profile">Votre Compte</a>
                                    <a class="dropdown-item" href="index.php?action=panier">commande</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="index.php?action=logout">deconexion</a>
                                 </div>
                              </li>

                           </ul>
                        </div>
                     </div>
                  <?php } else { ?>
                     <div class="col-md-8 col-sm-12">
                        <div class="right-nav">
                           <div class="login-sr">
                              <div class="login-signup">
                                 <ul>
                                    <li><a href="index.php?action=login">Login</a></li>
                                    <li><a class="custom-b" href="index.php?action=register">Sign up</a></li>
                                 </ul>
                              </div>
                           </div>
                        <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
               <!--/.container-fluid -->
      </nav>
   </header>

   <div><?= $content ?></div>
   <footer>
      <div class="main-footer">
         <div class="container">
            <div class="row">

               <div class="footer-link-box clearfix">
                  <div class="col-md-6 col-sm-6">
                     <div class="left-f-box">
                        <div class="col-sm-4">
                           <h2>Vendre sur E-artisanat</h2>
                           <ul>
                              <li><a href="index.php?action=register">Crer un compte</a></li>
                              <li><a href="index.php?action=faq">FAQ pour vendeur</a></li>
                           </ul>
                        </div>
                        <div class="col-sm-4">
                           <h2>Acheter sur E-artisanat</h2>
                           <ul>
                              <li><a href="index.php?action=register">Crer un compte</a></li>
                              <li><a href="index.php?action=faq">FAQ pour acheteur</a></li>
                           </ul>
                        </div>
                        <div class="col-sm-4">
                           <h2>COMPANY</h2>
                           <ul>
                              <li><a href="index.php?action=apropos">A propos de E-artisanat</a></li>
                              <li><a href="index.php?action=contact">Contactez-nous</a></li>

                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                     <div class="right-f-box">
                        <h2>category</h2>
                        <ul class="col-sm-4">
                          <li> <a  href="index.php?action=category&id=1">Alimentation</a></li>
                          <li><a  href="index.php?action=category&id=2">Batiment</a></li>
                          <li> <a  href="index.php?action=category&id=3">Fabrication</a></li>
                          <li>  <a  href="index.php?action=category&id=4">Service</a></li>
                        </ul>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="copyright">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <p><img width="90" src="images/logo.png" alt="#" style="margin-top: -5px;" /> All Rights Reserved. Company Name © 2018</p>
               </div>
               <div class="col-md-4">
                  <ul class="list-inline socials">
                     <li>
                        <a href="">
                           <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                     </li>
                     <li>
                        <a href="">
                           <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                     </li>
                     <li>
                        <a href="">
                           <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                     </li>
                     <li>
                        <a href="#">
                           <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                     </li>
                  </ul>
                  <!-- <ul class="right-flag">
                        <li><a href="#"><img src="images/flag.png" alt="" /> <span>Change</span></a></li>
                     </ul> -->
               </div>
            </div>
         </div>
      </div>
   </footer>
   <!--main js-->
   <script src="./js/jquery-1.12.4.min.js"></script>
   <!--bootstrap js-->
   <script src="./js/bootstrap.min.js"></script>
   <script src="./js/bootstrap-select.min.js"></script>
   <script src="./js/slick.min.js"></script>
   <script src="./js/wow.min.js"></script>
   <!--custom js-->
   <script src="./js/custom.js"></script>
</body>

</html>