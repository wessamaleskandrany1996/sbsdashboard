<?php
session_start();
include("../../config/dbcon.php");
include('../../functions/myfunctions.php');
if(isset($_POST['register_btn'])){
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);
    $check_email_query = "SELECT email FROM users WHERE email='$email' ";
    $check_email_query_run = mysqli_query($con, $check_email_query);
    
    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['message'] = "Email Already Exists";
        header('location: ../adduser.php');
    }
    else
    {
        if ($password === $cpassword) {
            $insert_query = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
            $insert_query_run = mysqli_query($con,$insert_query);
            if($insert_query_run){
                redirect("../index.php","User Added Successfully");
            }else{
                redirect("../adduser.php","Something Went Wrong");
            }
        }else{
            redirect("../adduser.php","password do not match");
        }
    }
}
?>