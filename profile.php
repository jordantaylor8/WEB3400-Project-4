<?php

require 'session.php'; //Rex Platt 10/21/2020
require 'dbcon.php'; //Rex Platt 10/21/2020

if (!isset($_SESSION['loggedin'])) {
  header('Location: index.php'); //<!---Rex Platt 10/23/2020 --->
  exit;
}
//prepare SQL to check username and password
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
//Bind parameters (s= string i = int b= blob etc), in our case the username ins a string so we use "s"
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();

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
  <?php include 'top-nav.php';?> <!--  Jordan Taylor 10/24/2020 -->
  <!-- START MAIN CONTAINER-->
  <div class="container">
    <div class="columns">

      <!-- START LEFT NAV COLUMN-->
      <div class="column is-3">
        <aside class="menu is-hidden-mobile">
          <p class="menu-label">General</p>
          <ul class="menu-list">
            <li><a href="home.php">Dashboard</a></li>
            <li><a href="profile.php" class="is-active">Profile</a></li>
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
                Edit your profile
                <!-- <?= $_SESSION['name'] ?>.-->
              </h1>
            </div>
          </div>
        </section>
        <!-- END HERO -->
        <hr class="hr">
        <!-- START CONTENT -->
        <section class="section">
          <div class="card">
            <div class="card-content">
              <div class="media">
                <div class="media-left">
                  <figure class="image is-48x48">
                    <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                  </figure>
                </div>

                <div class="media-content">
                  <p class="title is-4"><?= $_SESSION['name'] ?></p>
                  <p class="subtitle is-6"><?= $email ?></p>
                </div>
              </div>

              <div class="content">
                <?= $password ?>
              </div>
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