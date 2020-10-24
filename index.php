<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome!</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  <script defer src="js/bulma.js"></script>
</head>

<body>
  <section class="section">
    <div class="column is-4 is-offset-4">
      <h1 class="title">Login</h1>
      <p class="subtitle">Please login to proceed.</p>
      <div class="box">
        <form action="authentication.php" method="post">

          <div class="field">
            <div class="control">
              <!--- Rex Platt 10/23/2020 --->
              <?php if (isset($_GET['username'])) {
                echo "<input name='username' class='input is-danger' type='text' placeholder='Username'>";
                echo "<p class='help is-danger'>Incorrect username</p>";
              } else {
                echo "<input name='username' class='input' type='text' placeholder='Username'>";
              } ?>
              <!--- Rex Platt 10/23/2020 --->
            </div>
          </div>

          <div class="field">
            <div class="control">
              <!--- Rex Platt 10/23/2020 --->
              <?php if (isset($_GET['password'])) {
                echo "<input name='password' class='input is-danger' type='password' placeholder='Password'>";
                echo "<p class='help is-danger'>Incorrect password</p>";
              } else {
                echo "<input name='password' class='input' type='password' placeholder='Password'>";
              } ?>
              <!--- Rex Platt 10/23/2020 --->
            </div>
          </div>


          <div class="field">
            <div class="control">
              <button class="button is-info is-fullwidth">
                <span>Login</span>
                <span class="icon">
                  <i class="fas fa-sign-in-alt"></i>
                </span>
              </button>
            </div>
          </div>

        </form>
      </div>
      <p class="buttons are-small">
        <a class="button" href="register_user.php">
          <span class="icon"><i class="fas fa-user-plus"></i></span>
          <span>Sign Up</span>
        </a>
        <a class="button" href="#">
          <span class="icon"><i class="fas fa-key"></i></span>
          <span>Forgot Password</span>
        </a>
        <a class="button" href="#">
          <span>Need Help</span>
          <span class="icon"><i class="far fa-question-circle"></i></span>
        </a>
      </p>
    </div>
  </section>
</body>

</html>