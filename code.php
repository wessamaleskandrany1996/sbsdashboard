<?php
session_start();
include('config/dbcon.php');
include('functions/userfunctions.php');


 if (isset($_POST['update_task_btn'])) {
    $user_id = $_SESSION['auth_user']['user_id'];
    $task_id = $_POST['task_id'];
    $branch = $_POST['branch'];
    $task = $_POST['task'];
    $remarks = $_POST['remarks'];
    $hardware_used = $_POST['hardware_used'];
    $status = isset($_POST['status']) ? '1' : '0';

    $update_query = "UPDATE tasks SET branch='$branch',task='$task',remarks='$remarks',hardware_used='$hardware_used',status='$status' WHERE id='$task_id' AND user_id='$user_id'";
    $update_query_run = mysqli_query($con, $update_query);

    if ($update_query_run) {
        redirect_to("usertasks.php","Task updated Successfully");
    }else{
        redirect_to("edittask.php?id=$task_id","Something Went Wrong");
    }

}
else
{
    header('location: ../index.php');
}

if (isset($_POST['assign_task_btn'])) {
    $user_id = $_SESSION['auth_user']['user_id'];
    $task_id = $_POST['task_id'];
    $branch = $_POST['branch'];
    $task = $_POST['task'];
    $remarks = $_POST['remarks'];
    $hardware_used = $_POST['hardware_used'];
    $status = isset($_POST['status']) ? '1' : '0';

    $query = "INSERT INTO tasks (branch,task,remarks,hardware_used,status,user_id) VALUES ('$branch','$task','$remarks','$hardware_used','$status','$user_id')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        redirect_to("usertasks.php","Task Assigned Successfully");
    }else{
        redirect_to("usertasks.php?id=$task_id","Something Went Wrong");
    }

}
else
{
    header('location: ../index.php');
}