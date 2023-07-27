<?php
session_start();
$session = $_SESSION['u_info'];
$admin = $session['user_role'];
$user = $session['id'];
?>

<header>
  <h3 class="logo">St.Famscilla</h3>
  <nav>
    <a href="http://localhost:8000/Bank/">Home</a>
    <a href="http://localhost:8000/Bank/about">About</a>
    <a href="http://localhost:8000/Bank/contact">Contact</a>
    <a href="http://localhost:8000/Bank/services">Services</a>
  </nav>
  <span id="mobile-menu" onclick="OpenMenu()"
    ><i class="bi bi-list"></i
    ></span>
  <div style="display: none" id="menu" data="0" class="mobileMenu">
    <?php
    if ($user && !$admin) {
      ?>
      <li>
        <a href="http://localhost:8000/Bank"><i class="bi bi-house"></i>Home</a>
      </li>
      <li>
        <a href="http://localhost:8000/Bank/profile"><i class="bi bi-person-circle"></i>Profile</a>
      </li>
            <li>
        <a href="http://localhost:8000/Bank/user-notification"><i class="bi bi-bell"></i>notification<span id="budget">0</span></a>
      </li>
      <li>
        <a href="http://localhost:8000/Bank/loan-history"><i class="bi bi-credit-card-2-front"></i>Loan </a>
      </li>
      <li>
        <a href="http://localhost:8000/Bank/logout"><i class="bi bi-arrow-left-circle"></i>Logout</a>
      </li>
      <?php
    } else if ($admin && $user) {
      ?>
      <li>
        <a href="http://localhost:8000/Bank/dashboard"><i class="bi bi-grid"></i>Dashboard</a>
      </li>
      <li>
        <a href="http://localhost:8000/Bank/notification"><i class="bi bi-bell"></i>notification<span id="budget">0</span></a>
      </li>
      <li>
        <a href="http://localhost:8000/Bank/customize"><i class="bi bi-gear"></i>Customize</a>
      </li>
      <li>
        <a href="http://localhost:8000/Bank/logout"><i class="bi bi-arrow-left-circle"></i>Logout</a>
      </li>
      <?php
    } else {
      ?>
      <li>
        <a href="http://localhost:8000/Bank/login"><i class="bi bi-shield-lock"></i>Login</a>
      </li>
      <li>
        <a href="http://localhost:8000/Bank/signup"><i class="bi bi-person-plus"></i>Signup</a>
      </li>
      <?php
    } ?>
    <li>
      <a href="http://localhost:8000/Bank/about"><i class="bi bi-info-circle"></i>About</a>
    </li>
    <li>
      <a href="http://localhost:8000/Bank/contact"><i class="bi bi-telephone"></i>Contact</a>
    </li>
    <li>
      <a href="http://localhost:8000/Bank/service"><i class="bi bi-bank"></i>Services</a>
    </li>
  </div>
</header>