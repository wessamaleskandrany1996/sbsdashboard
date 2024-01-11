<?php 
include('config/dbcon.php');

function getAllActive($table){
    global $con;
    $query = "SELECT * FROM $table WHERE status='1' ";
    return $query_run = mysqli_query($con, $query);
};
function getAllTrending(){
    global $con;
    $query = "SELECT * FROM products WHERE trending='1' ";
    return $query_run = mysqli_query($con, $query);
};
function redirect($url, $message){
    $_SESSION['message'] = $message;
    header('location: '.$url);
    exit();
};
function getById($table, $id){
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' ";
    return $query_run = mysqli_query($con, $query);
};
function redirect_to($url, $message){
    $_SESSION['message'] = $message;
    header('location: '.$url);
    exit();
};
function getIdActive($table, $id){
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' AND status='1' ";
    return $query_run = mysqli_query($con, $query);
};
function getSlugActive($table, $slug){
    global $con;
    $query = "SELECT * FROM $table WHERE slug='$slug' AND status='1' LIMIT 1 ";
    return $query_run = mysqli_query($con, $query);
};
function getProdByCategory($category_id)
{
    global $con;
    $query = "SELECT * FROM products WHERE category_id='$category_id' AND status='1' ";
    return $query_run = mysqli_query($con, $query);
};
function getCartItems()
{
    global $con;
    $user_id = $_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid, c.prod_id,c.prod_qty, p.id as pid, p.name, p.image, p.selling_price FROM carts c, products p WHERE c.prod_id=p.id AND c.user_id='$user_id' ORDER BY c.id DESC ";
    return $query_run = mysqli_query($con, $query);
};
function getOrders()
{
    global $con;
    $user_id = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE user_id='$user_id' ";
    return $query_run = mysqli_query($con, $query);
};
function checkTrackingNoValid($trackingNo)
{
    global $con;
    $user_id = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE tracking_no='$trackingNo' AND user_id='$user_id' ";
    return $query_run = mysqli_query($con, $query);
}
function getUserTasks(){
    global $con;
    $user_id = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM tasks WHERE user_id='$user_id' OR user_id = 1000 ";
    return $query_run = mysqli_query($con, $query);
};
function getTaskToAssign ($id){
    global $con ;
    $user_id = $_SESSION['auth_user']['user_id'];
    $select_query = "SELECT * FROM tasks WHERE id='$id' AND user_id = 1000 ";
    return $select_query_run = mysqli_query($con, $select_query);
}
function assign (){
    global $con ;
    $user_id = $_SESSION['auth_user']['user_id'];
    $query = "INSERT INTO tasks (branch,task,remarks,hardware_used,status,user_id) VALUES ('$branch','$task','$remarks','$hardware_used','$status','$user_id')";
    $query_run = mysqli_query($con, $query);
}
?>