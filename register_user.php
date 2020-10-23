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
      <h1 class="title">Create Account</h1>
      <p class="subtitle">Please fill in the form to create your account</p>
      <div class="box">
        <form action="register.php" method="post">

          <div class="field">
            <div class="control">
              <!---Rex Platt 10/23/2020--->
              <?php if(isset($_GET['completeForm'])){
                        echo"<input name='username' class='input is-danger' type='text' placeholder='Username'>";
                        echo "<p class='help is-danger'>Required Field</p>";
  
                          
                        }elseif(isset($_GET['usernameExists'])){
                              echo"<input name='username' class='input is-danger' type='text' placeholder='Username'>";
                              echo "<p class='help is-danger'>Username already exists. Please choose another. </p>";
  
  
                        }else{
                          echo"<input name='username' class='input' type='text' placeholder='Username'>";
                          }?>
              <!---Rex Platt 10/23/2020--->
            </div>
          </div>
          <div class="field">
            <div class="control">
             <!---Rex Platt 10/23/2020--->
               <?php if(isset($_GET['completeForm'])){
                        echo"<input name='email' class='input is-danger' type='text' placeholder='Email'>";
                        echo "<p class='help is-danger'>Required Field</p>";
  
                          
                        }else{
                          echo"<input name='email' class='input' type='text' placeholder='Email'>";
                          }?>
              <!---Rex Platt 10/23/2020--->
            </div>
          </div>
          <div class="field">
            <div class="control">
              <!---Rex Platt 10/23/2020--->
               <?php if(isset($_GET['completeForm'])){
                        echo"<input name='password' class='input is-danger' type='password' placeholder='Password'>";
                        echo "<p class='help is-danger'>Required Field</p>";
  
                          
                        }else{
                          echo"<input name='password' class='input' type='password' placeholder='Password'>";
                          }?>
              <!---Rex Platt 10/23/2020--->
            </div>
          </div>

          <div class="field">
            <div class="control">
              <button class="button is-info is-fullwidth">
                <span>Create your account</span>
                    <span class="icon">
                      <i class="fas fa-user-plus"></i>
                    </span>
                  </button>
            </div>
          </div>

        </form>
      </div>
      <p class="buttons are-small">
        <a class="button" href="index.php"><!---Rex Platt 10/23/2020--->
          <span>Back to home</span>
              <span class="icon"><i class="fas fa-home"></i></span>
        <a class="button" href="#">
          <span>Need Help</span>
              <span class="icon"><i class="far fa-question-circle"></i></span>
            </a>
      </p>
    </div>
  </section>
</body>

</html>