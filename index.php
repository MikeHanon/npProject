<?php 
require('./controller/controller.php');
session_start();
if(isset($_GET['action'])){
if($_GET['action'] == 'register'){
    register();
}else if ($_GET['action'] == 'verify')
{
    require('./view/verifyView.php');
}
}else{
    require('./view/indexView.php');
}