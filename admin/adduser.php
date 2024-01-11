<?php
session_start();
include("includes/header.php");
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
            <div class="py-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div>
                            <?php if (isset($_SESSION['message'])) { ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Hay!</strong>
                                    <?= $_SESSION['message'] ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php
                                unset($_SESSION['message']);
                            }
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Add New User</h4>
                                </div>
                                <div class="card-body">
                                    <form action="functions/authcode.php" method="POST">
                                        <div class="mb-3">
                                            <label for="user" class="form-label">User Name</label>
                                            <input type="text" name="name" required class="form-control" id="user"
                                                placeholder="enter user name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" required
                                                placeholder="enter user email" id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password" minlength="4" name="password"
                                                placeholder="enter usr password" class="form-control" required
                                                id="exampleInputPassword1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="confirm" class="form-label">Confirm Password</label>
                                            <input type="password" name="cpassword" placeholder="re-enter user password"
                                                class="form-control" required id="confirm">
                                        </div>
                                        <button type="submit" name="register_btn"
                                            class="text-center btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>