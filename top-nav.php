<?php   
// Jordan Taylor 10/24/2020
echo '
    <nav class="navbar is-light">
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item" href="home.php">
            <span class="icon is-large">
              <i class="fas fa-toolbox"></i>
            </span>
          </a>
          <div class="navbar-burger burger" data-target="navMenu">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
        <div id="navMenu" class="navbar-menu">
          <div class="navbar-start">
            <!-- navbar link go here -->
          </div>
          <div class="navbar-end">
            <div class="navbar-item">
              <div class="buttons">
                <a href="profile.php" class="button">
                  <span class="icon"><i class="fas fa-user-circle"></i></span
                  ><span>Profile</span>
                </a>
                <a href="logout.php" class="button">
                  <span class="icon"><i class="fas fa-sign-out-alt"></i></span
                  ><span>Logout</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>';
