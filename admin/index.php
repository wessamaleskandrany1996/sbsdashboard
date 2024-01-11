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
                                <a
                                    class="nav-link text-white <?= $page == 'index.php' ? "active bg-gradient-primary" : ""; ?> "
                                    href="index.php">
                                    <div class="text-white ms-5 text-center me-2 d-inline align-items-center justify-content-center">
                                        <span class="nav-link-text text-center ms-1">SBS</span>
                                    </div>
                                </a>
                            </li>
                            <li class="w-100"> 
                                <a
                                    class="nav-link text-white <?= $page == 'index.php' ? "active bg-gradient-primary" : ""; ?> "
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
                        <div class="card w-100">
                            <div class="card-header d-flex justify-content-between container">
                                <h4 class="mt-3">Users</h4>
                                <a href="adduser.php" class="col-3 btn btn-sm btn-success mt-3">Add New</a>
                            </div>
                            <div class="card-body">
                                <table id="tblUser" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>NAME</th>
                                            <th>EMAIL</th>
                                            <th>RULE AS</th>
                                            <th>CREATED AT</th>
                                            <th>EDIT</th>
                                            <th>DELETE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $users = getAll("users");
                                        if (mysqli_num_rows($users) > 0) {
                                            foreach ($users as $item) {
                                                ?>
                                                <tr class="text-center">
                                                    <td>
                                                        <?= $item['id']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $item['name']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $item['email']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $item['rule_as'] == '1' ? "Admin" : "user"; ?>
                                                    </td>
                                                    <td>
                                                        <?= $item['created_at']; ?>
                                                    </td>
                                                    <td>
                                                        <a href="edituser.php?id=<?= $item['id']; ?>"
                                                            class="btn btn-sm btn-primary">Edit</a>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-danger btn-sm"
                                                            href='./code.php?id=<?php echo ($item['id']); ?>'>Delete</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            echo "No Records Found";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
<script>
    jQuery(document).ready(function ($) {
        $('#tblUser').DataTable();
    });
</script>