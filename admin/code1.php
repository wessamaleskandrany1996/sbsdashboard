<?php
include('../config/dbcon.php');
include('../functions/myfunctions.php');


if(isset($_GET['id'])){
    $id = $_GET['id'];
    echo($id);
    $query = "DELETE from tasks where id = $id";
    $sql = $con->prepare($query);
    $delete_query_run = $sql->execute();
    if ($delete_query_run) {
        redirect("./tasks.php","Task Deleted Successfully");
    }else{
        redirect("./tasks.php","Something Went Wrong");
    }
}
else
{
    header('location: ../index.php');
}