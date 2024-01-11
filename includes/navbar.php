<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark shadow">
  <div class="container">
    <a class="navbar-brand" href="usertasks.php">
      <span style="color:#2ab8ec" class="nav-link">SBS</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <?php
          if (isset($_SESSION['auth'])) 
          {
            echo "welcome";
         ?>
        <li class="nav-item dropdown">
          <a style="color:#2ab8ec" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['auth_user']['name'] ?>
          </a>
          <ul class="dropdown-menu">
            <li><a style="color:#2ab8ec" class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
        <?php 
        }else{
          echo "nosession";
          ?>
            <li class="nav-item">
              <a style="color:#2ab8ec" class="nav-link" href="index.php">Login</a>
            </li>>
          <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>