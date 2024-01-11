<?php 
include('../functions/myfunctions.php');
    if (isset($_SESSION['auth'])) {
        if ($_SESSION['rule_as'] == 0) {
            redirect("../index.php","You Are Not Authorized To Access This Page");
        }
    }else {
        redirect("../login.php","Login To Continue");
    }
?>    