<?php 
session_start();
include('../config/dbcon.php');
function getAll($table){
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
};
function getAllActive($table){
    global $con;
    $query = "SELECT * FROM $table where status='1' ";
    return $query_run = mysqli_query($con, $query);
};
function getById($table, $id){
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' ";
    return $query_run = mysqli_query($con, $query);
};
function redirect($url, $message){
    $_SESSION['message'] = $message;
    header('location: '.$url);
    exit();
};
function getAllOrders(){
    global $con;
    $query = "SELECT * FROM orders ";
    return $query_run = mysqli_query($con, $query);
}
function checkTrackingNoValid($trackingNo)
{
    global $con;
    $query = "SELECT * FROM orders WHERE tracking_no='$trackingNo' ";
    return $query_run = mysqli_query($con, $query);
};
?>