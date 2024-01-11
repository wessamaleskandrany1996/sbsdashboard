<?php
include('../middLeware/adminMiddleware.php');
include('includes/header.php');

?>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 rounded px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a class="nav-link text-white <?= $page == 'index.php' ? "active bg-gradient-primary" : ""; ?> "
                                    href="index.php">
                                    <div
                                        class="text-white ms-5 text-center me-2 d-inline align-items-center justify-content-center">
                                        <span class="nav-link-text text-center ms-1">SBS</span>
                                    </div>
                                </a>
                            </li>
                            <li class="w-100">
                                <a class="nav-link text-white <?= $page == 'index.php' ? "active bg-gradient-primary" : ""; ?> "
                                    href="index.php">
                                    <div
                                        class="text-white text-center me-2 d-inline align-items-center justify-content-center">
                                        <i class="material-icons opacity-10">table_view</i>
                                    </div>
                                    <span class="nav-link-text ms-1"> All Users</span>

                                </a>
                            </li>
                            <li class="w-100">
                                <a class="nav-link text-white <?= $page == 'adduser.php' ? "active bg-gradient-primary" : ""; ?>"
                                    href="adduser.php">
                                    <div
                                        class="text-white text-center me-2 d-inline align-items-center justify-content-center">
                                        <i class="material-icons opacity-10">add</i>
                                    </div>
                                    <span class="nav-link-text ms-1">Add User</span>
                                </a>
                            </li>
                            <li class="w-100">
                                <a class="nav-link text-white <?= $page == 'tasks.php' ? "active bg-gradient-primary" : ""; ?>"
                                    href="tasks.php">
                                    <div
                                        class="text-white text-center me-2 d-inline align-items-center justify-content-center">
                                        <i class="material-icons opacity-10">table_view</i>
                                    </div>
                                    <span class="nav-link-text ms-1"> All Tasks</span>
                                </a>
                            </li>
                            <li class="w-100">
                                <a class="nav-link text-white <?= $page == 'addtask.php' ? "active bg-gradient-primary" : ""; ?>"
                                    href="addtask.php">
                                    <div
                                        class="text-white text-center me-2 d-inline align-items-center justify-content-center">
                                        <i class="material-icons opacity-10">add</i>
                                    </div>
                                    <span class="nav-link-text ms-1">Add Task</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="sidenav-footer  w-100 bottom-0 ">
                    <div class="mx-3">
                        <a class="btn bg-gradient-primary mt-4 w-100" href="../logout.php" type="button">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col py-3">

            <div class="container">
                <div class="row">
                    <div>
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
                                                <div class="col-md-12">
                                                    <label class="mb-0" for="name">Select User</label>
                                                    <select name="user_id" class="form-select mb-2">
                                                        <option>Select User</option>
                                                        <option value="1000">All Users</option>
                                                        <?php
                                                        $users = getAll("users");
                                                        if (mysqli_num_rows($users) > 0) {
                                                            foreach ($users as $item) {
                                                                ?>
                                                                <option value="<?= $item['id']; ?>" <?= $data['user_id'] == $item['id'] ? 'selected' : '' ?>>
                                                                    <?= $item['name']; ?>
                                                                </option>
                                                                <?php
                                                            }
                                                        } else {
                                                            echo "All";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="branch">Branch</label>
                                                    <input type="hidden" name="task_id" value="<?= $data['id'] ?>">
                                                    <input type="text" name="branch" value="<?= $data['branch'] ?>" id="branch"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="task"> Task</label>
                                                    <input type="text" name="task" value="<?= $data['task'] ?>" id="task"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="remarks">Remarks</label>
                                                    <textarea name="remarks" rows="4" cols="50" id="remarks"
                                                        class="form-control mb-2"><?= $data['remarks'] ?></textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="hardware_used">Hardware Used</label>
                                                    <input type="text" name="hardware_used"
                                                        value="<?= $data['hardware_used'] ?>" id="hardware_used"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <?php if ($data['status'] == 0) {
                                                        ?>
                                                        <input type="checkbox" name="status" value="<?= $data['status'] ?>"
                                                            id="status" <?php echo $data['status'] == 0 ? '' : 'checked' ?>>
                                                        <label for="status" class="form-check-label">Done</label>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <input type="checkbox" name="status" value="<?= $data['status'] ?>"
                                                            id="status" <?php echo $data['status'] == 1 ? 'checked' : '' ?>>
                                                        <label for="status" class="form-check-label">Done</label>
                                                        <?php
                                                    }
                                                    ?>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-primary"
                                                            name="update_task_btn">Save</button>
                                                    </div>
                                                </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
                            } else {
                                echo "Task Not Found";
                            }
                        } else {
                            echo "Id messing from url";
                        }
                        ?>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>