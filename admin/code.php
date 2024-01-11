<?php
include('../config/dbcon.php');
include('../functions/myfunctions.php');

if (isset($_POST['add_category_btn'])) {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $meta_title = $_POST['meta_title'];
    $description = $_POST['description'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keyword'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';
    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;
    $category_query = "INSERT INTO categories (name,slug,meta_title,description,meta_description,meta_keyword,status,popular,image) VALUES ('$name','$slug','$meta_title','$description','$meta_description','$meta_keywords','$status','$popular','$filename')";
    $cate_query_run = mysqli_query($con, $category_query);
    if ($cate_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        redirect("addcategory.php","Category Added Successfully");
    }else{
        redirect("addcategory.php","something went wrong");
    }
}
else if (isset($_POST['update_user_btn'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $rule_as =isset($_POST['rule_as']) ? '1' : '0';


    $update_query = "UPDATE users SET name='$name',email='$email',rule_as='$rule_as' WHERE id='$user_id' ";
    $update_query_run = mysqli_query($con, $update_query);

    if ($update_query_run) {
        redirect("edituser.php?id=$user_id","User updated Successfully");
    }else{
        redirect("edituser.php?id=$user_id","Something Went Wrong");
    }

}

else if(isset($_GET['id'])){
    $id = $_GET['id'];
    echo($id);
    $query = "DELETE from users where id = $id";
    $sql = $con->prepare($query);
    $delete_query_run = $sql->execute();
    if ($delete_query_run) {
        redirect("./index.php","User Deleted Successfully");
    }else{
        redirect("./index.php","Something Went Wrong");
    }
}


else if (isset($_POST['add_task_btn'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $note = $_POST['note'];
    $status = isset($_POST['status']) ? '1' : '0';
    $description = $_POST['description'];

    if ($name != "" && $note != "" && $status != "" && $description != "") {
        $task_query = "INSERT INTO tasks (name,note,description,status,user_id) VALUES ('$name','$note','$description',$status,$user_id)";
        $task_query_run = mysqli_query($con, $task_query);

            if ($task_query_run) {
                redirect("addtask.php","task Added Successfully");
            }else{
                redirect("addtask.php","something went wrong");
            }
    }
    else
    {
        redirect("addtask.php","All Fields Required");
    }
}


// else if (isset($_POST['delete_task_btn'])) {
//     $task_id = mysqli_real_escape_string($con, $_POST['task_id']);
//     $task_query = "SELECT * FROM tasks WHERE id='$task_id' ";
//     $task_query_run = mysqli_query($con, $task_query);
//     $task_data = mysqli_fetch_array($task_query_run);
//     $delete_query = "DELETE FROM tasks WHERE id='$task_id' ";
//     $delete_query_run = mysqli_query($con, $delete_query);
//     if ($delete_query_run) {
//         echo 200;
//     }else{
//         echo 500;
//     }
// }
else if (isset($_POST['update_task_btn'])) {
    $task_id = $_POST['task_id'];
    $user_id = $_POST['user_id'];
    $branch = $_POST['branch'];
    $task = $_POST['task'];
    $remarks = $_POST['remarks'];
    $hardware_used = $_POST['hardware_used'];
    $status = isset($_POST['status']) ? '1' : '0';

    $update_query = "UPDATE tasks SET user_id='$user_id',branch='$branch',task='$task',remarks='$remarks',hardware_used='$hardware_used',status='$status' WHERE id='$task_id' ";
    $update_query_run = mysqli_query($con, $update_query);

    if ($update_query_run) {
        redirect("edittask.php?id=$task_id","Task updated Successfully");
    }else{
        redirect("edittask.php?id=$task_id","Something Went Wrong");
    }

}
else if (isset($_POST['update_order_btn'])){
    $order_id = $_POST['id'];
    $name = $_POST['name'];
    $tracking_no = $_POST['tracking_no'];
    $status = isset($_POST['status']) ? '1' : '0';

    $update_query = "UPDATE orders SET name='$name',name='$name',tracking_no='$tracking_no',status='$status' WHERE id='$order_id' ";
    $update_query_run = mysqli_query($con, $update_query);

    if ($update_query_run) {
        redirect("editorder.php?id=$order_id","Order updated Successfully");
    }else{
        redirect("editorder.php?id=$order_id","Something Went Wrong");
    }
}
else if (isset($_POST['delete_order_btn'])){
    $order_id = mysqli_real_escape_string($con, $_POST['id']);
    $delete_query = "DELETE FROM orders WHERE id='$order_id' ";
    $delete_query_run = mysqli_query($con, $delete_query);

    if ($delete_query_run) {
        echo 200;
    }else{
        echo 500;
    }

}
else
{
    header('location: ../index.php');
}