<?php
session_start();
include("../config/dbcon.php");
include('../functions/myfunctions.php');

 if(isset($_POST['login_btn'])){
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    $login_query = "SELECT * FROM users WHERE email='$email' and password='$password' ";
    $login_query_run = mysqli_query($con, $login_query);
    if (mysqli_num_rows($login_query_run) > 0) {
        $_SESSION['auth'] = true ;
        $userdata = mysqli_fetch_array($login_query_run);
        $user_id = $userdata['id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $rule_as =  $userdata['rule_as'];
        $_SESSION['auth_user'] = [
            'user_id' =>$user_id,
            'name' => $username,
            'email' => $useremail
        ];
        $_SESSION['rule_as'] = $rule_as ;
        if ($rule_as == 1 ) {
            redirect("../admin/index.php","Welcome");
        }else if($rule_as == 0){
            redirect("../usertasks.php","Logged In Successfully");
        }
    }
    else
    {
        redirect("../index.php","Invalid Cradentionals");
    }
}
?>