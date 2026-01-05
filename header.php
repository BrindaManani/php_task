
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">

    <!-- Brand -->
    <a class="navbar-brand" href="dashboard.php">MyShop</a>


    <!-- Navbar links -->
    <div class="navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">

        <li class="nav-item">
          <a class="nav-link <?= basename($_SERVER['PHP_SELF'])=='dashboard.php'?'active':'' ?>" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= basename($_SERVER['PHP_SELF'])=='products.php'?'active':'' ?>" href="products.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= basename($_SERVER['PHP_SELF'])=='cart.php'?'active':'' ?>" href="cart.php">Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= basename($_SERVER['PHP_SELF'])=='orders.php'?'active':'' ?>" href="orders.php">Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= basename($_SERVER['PHP_SELF'])=='info.php'?'active':'' ?>" href="info.php">Summery</a>
        </li>

      </ul>

      <!-- Login / User -->
      <ul class="navbar-nav ms-auto">
        <?php if(isset($_SESSION['user'])): ?>
          <li class="nav-item">
            <p class="navbar-text me-2">Hello, <?= htmlspecialchars($_SESSION['user']); ?></p>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../backend/logout.php">Logout</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        <?php endif; ?>
      </ul>

    </div>
  </div>
</nav>
