<?php  
    $pageName = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Batch 282</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $pageName == "index.php" ? "active":null ?>" aria-current="page" href="./">All User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $pageName == "add-user.php" ? "active":null ?>" href="./add-user.php">Add New User</a>
        </li>
      </ul>
    </div>
  </div>
</nav>