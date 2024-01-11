<?php 
session_start();
    include("functions/userfunctions.php");
    include("includes/header.php");
    include("auth.php");
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $task = getById("tasks", $id);
            if (mysqli_num_rows($task) > 0) {
                $data = mysqli_fetch_array($task);
            ?>

            <div class="card">
                <div class="card-header">
                    <h4>Edit Task</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">

                            <div class="col-md-6">
                                <label for="branch">Branch</label>
                                <input type="hidden" name="task_id" value="<?= $data['id'] ?>">
                                <input type="text" name="branch" value="<?= $data['branch'] ?>" id="branch" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="task"> Task</label>
                                <input type="text" name="task" value="<?= $data['task'] ?>" id="task" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="remarks">Remarks</label>
                                <textarea name="remarks" rows="4" cols="50" id="remarks" class="form-control mb-2"><?= $data['remarks'] ?></textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="hardware_used">Hardware Used</label>
                                <input type="text" name="hardware_used" value="<?= $data['hardware_used'] ?>" id="hardware_used" class="form-control">
                            </div>
                            
                            <div class="col-md-6">
                                <?php if ($data['status'] == 0) {
                                    ?>
                                        <input type="checkbox" name="status" value="<?= $data['status']  ?>" id="status" <?php echo $data['status'] == 0 ? '' : 'checked'?> >
                                        <label for="status" class="form-check-label">Done</label>
                                    <?php
                                }else {
                                    ?> 
                                        <input type="checkbox" name="status" value="<?= $data['status'] ?>" id="status" <?php echo $data['status'] == 1 ? 'checked' : ''?> >
                                        <label for="status" class="form-check-label">Done</label>
                                    <?php
                                }
                                ?>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="update_task_btn">Save</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
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
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>