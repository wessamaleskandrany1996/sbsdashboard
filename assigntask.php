<?php
session_start();
include('config/dbcon.php');
include('functions/userfunctions.php');
include("includes/header.php");

?>
<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $task = getTaskToAssign($id);
    if (mysqli_num_rows($task) > 0) {
        $data = mysqli_fetch_array($task);
?>
                        <div class="py-5">
                            <div class="py-5">
                                <div class="py-5">
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="task_id" value="<?= $data['id'] ?>">
                                    <input type="hidden" name="branch" value="<?= $data['branch'] ?>" id="branch" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <input type="hidden" name="task" value="<?= $data['task'] ?>" id="task" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <input name="remarks" type="hidden" id="remarks" value="<?= $data['remarks'] ?>" class="form-control mb-2">
                                </div>

                                <div class="col-md-6">
                                    <input type="hidden" name="hardware_used" value="<?= $data['hardware_used'] ?>" id="hardware_used" class="form-control">
                                </div>
                                
                                <div class="col-md-6">
                                    <input type="hidden" name="status" value="<?= $data['status']  ?>" id="status" >
                                </div>
                                <div class="text-center py-5">
                                    <h3>Are you sure you want to assign this task to you ... </h3>
                                    <br>
                                </div>
                                <div class="col-7 text-center d-flex align-items-center justify-content-center">
                                    <button type="submit" class="btn btn-success" name="assign_task_btn">Assign</button>
                                </div>
                                <div class="col-3 text-center d-flex align-items-center justify-content-center">
                                <a href="usertasks.php"  class="btn btn-danger">Back</a>
                                </div>
                            </div>
                        </form>
                                </div>
                            </div>
                        </div>
                        
<?php
    }else{
        echo "Task Not Found";
        }
    }else{
        echo "Id messing from url";
    }   
?>

<?php include('includes/footer.php'); ?>