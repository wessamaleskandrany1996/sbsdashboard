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
                            $user = getById("users", $id);
                            if (mysqli_num_rows($user) > 0) {
                                $data = mysqli_fetch_array($user);
                                ?>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Edit User</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="code.php" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="name">Name</label>
                                                    <input type="hidden" name="user_id" value="<?= $data['id'] ?>">
                                                    <input type="text" name="name" value="<?= $data['name'] ?>" id="name"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" value="<?= $data['email'] ?>" id="email"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-12 pt-3 pb-3 mb-3 mt-3">
                                                    <?php if ($data['rule_as'] == 0) {
                                                        ?>
                                                        <input type="checkbox" name="rule_as" value="<?= $data['rule_as'] ?>"
                                                            id="rule_as" <?php echo $data['rule_as'] == 0 ? '' : 'checked' ?>>
                                                        <label for="rule_as">Admin</label>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <input type="checkbox" name="rule_as" value="<?= $data['rule_as'] ?>"
                                                            id="rule_as" <?php echo $data['rule_as'] == 1 ? 'checked' : '' ?>>
                                                        <label for="rule_as">Admin</label>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <button type="submit" class="btn btn-primary "
                                                        name="update_user_btn">Update</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <?php
                            } else {
                                echo "Category Not Found";
                            }
                        } else {
                            echo "Id messing from url";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>