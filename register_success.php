
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create Account</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  <script defer src="js/bulma.js"></script>
</head>

<body>
  <section class="section">
    <div class="column is-4 is-offset-4">
      <h1 class="title">Account created!</h1><!--//Rex Platt 10/21/2020-->
      <p class="subtitle">Please verify your email account using the email that we sent to:</p><!--//Rex Platt 10/21/2020-->
      <?php if(isset($_GET['email'])){
          echo "<p class='subtitle'>". $_GET['email']."</p>";
        }
      ?>
      <div class="box">
        <form action="index.php" ><!--//Rex Platt 10/21/2020-->
          <div class="field">
            <div class="control">
              <button class="button is-info is-fullwidth">
                <span>Return to home</span><!--//Rex Platt 10/21/2020-->
                    <span class="icon">
                      <i class="fas fa-home"></i><!--//Rex Platt 10/21/2020-->
                    </span>
                  </button>
            </div>
          </div>

        </form>
      </div>
      <p class="buttons are-small">
        <a class="button" href="#">
          <span>Need Help</span>
              <span class="icon"><i class="far fa-question-circle"></i></span>
            </a>
      </p>
    </div>
  </section>
</body>

</html>