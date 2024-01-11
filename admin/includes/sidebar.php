<?php  
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1);
?>
<style>
  .g-sidenav-show:not(.rtl) .sidenav {
        transform: translateX(0)
    }
    .navbar-vertical.navbar-expand-xs {
    display: block;
    position: fixed;
    top: 0;
    bottom: 0;
    max-width: 15.625rem!important;
    overflow-y: auto;
    padding: 0;
    box-shadow: none
}
.nav.nav-pills .nav-link {
  color: #f6f7f9;
    border-radius: 0.5rem;
    background-color: inherit;
}
.nav.nav-pills{
  background-color: #344767!important;
}

</style>
  <!-- <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0 text-center" href="" target="_blank">
        <span class="ms-1 text-center font-weight-bold text-white">SBS</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="w-auto max-height-vh-50" id="sidenav-collapse-main">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link text-white <?= $page == 'index.php'? "active bg-gradient-primary":""; ?> " href="index.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1"> All Users</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == 'adduser.php'? "active bg-gradient-primary":""; ?>" href="adduser.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add</i>
            </div>
            <span class="nav-link-text ms-1">Add User</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == 'tasks.php'? "active bg-gradient-primary":""; ?>" href="tasks.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1"> All Tasks</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == 'addtask.php'? "active bg-gradient-primary":""; ?>" href="addtask.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add</i>
            </div>
            <span class="nav-link-text ms-1">Add Task</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer  w-100 bottom-0 ">
      <div class="mx-3">
        <a 
        class="btn bg-gradient-primary mt-4 w-100" 
        href="../logout.php" 
        type="button">Logout</a>
      </div>
    </div>
  </aside> -->
  
  