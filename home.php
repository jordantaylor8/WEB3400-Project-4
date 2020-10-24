<?php
// We need to use sessions, so you should always start sessions using the below code.
require 'session.php'; //<!---Rex Platt 10/23/2020 --->
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: index.html');
  exit();
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css" />
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>

<body>
<?php include 'top_nav.php'; ?> <!--  Jordan Taylor 10/24/2020 -->
  <!-- START MAIN CONTAINER-->
  <div class="container">
    <div class="columns">

      <!-- START LEFT NAV COLUMN-->
      <div class="column is-3">
        <aside class="menu is-hidden-mobile">
          <p class="menu-label">General</p>
          <ul class="menu-list">
            <li><a href="home.php" class="is-active">Dashboard</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </aside>
      </div>
      <!-- END LEFT NAV -->

      <!-- START RIGHT CONTENT COLUMN -->
      <div class="column is-9">

        <!-- START HERO -->
        <section class="hero is-info welcome is-small">
          <div class="hero-body">
            <div class="container">
              <h1 class="title">
                Welcome back,
                <?= $_SESSION['name'] ?>.
              </h1>
              <h2 class="subtitle">
                I hope you are having a great day!
              </h2>
            </div>
          </div>
        </section>
        <!-- END HERO -->
        <hr class="hr">
        <!-- START CONTENT -->
        <section class="info-tiles">
          <div class="tile is-ancestor has-text-centered">
            <div class="tile is-parent">
              <article class="tile is-child box">
                <p class="title">439k</p>
                <p class="subtitle">Users</p>
              </article>
            </div>
            <div class="tile is-parent">
              <article class="tile is-child box">
                <p class="title">59k</p>
                <p class="subtitle">Products</p>
              </article>
            </div>
            <div class="tile is-parent">
              <article class="tile is-child box">
                <p class="title">3.4k</p>
                <p class="subtitle">Open Orders</p>
              </article>
            </div>
            <div class="tile is-parent">
              <article class="tile is-child box">
                <p class="title">19</p>
                <p class="subtitle">Exceptions</p>
              </article>
            </div>
          </div>
        </section>
        <!-- END CONTENT -->

      </div>
      <!-- END RIGHT CONTENT COLUMN -->
    </div>
  </div>
  <!-- END MAIN CONTAINER -->
  <script async type="text/javascript" src="js/main.js"></script>
</body>

</html>