<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en" class="htmls">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/style.css" />


    <title>RESET PASSWORD</title>
  </head>
  <body>
<div class="bd">
      <div class="container">
        <div class="sec-1">

        <div class="form-container sign-in-container">
            <form action="includes/login.res.php" method="post">
              <h1>RESET PASSWORD</h1>
              <?php
              if(isset($_GET["error"])){
                if($_GET["error"]=="emptyfields"){
                  echo '<p class="pr-glow">Fill In All Fields</p>';
                }
            
                elseif($_GET["error"]=="invalians"){
                  echo '<p class="pr-glow">Invalid Name</p>';
                }
              }
              ?>
              <input type="email" name="email" placeholder="Email" />
            <input type="password" name="password" placeholder="New Password" />
            <input type="password" name="password-rep" placeholder="Recheck Password"/>
              
              <button class="submit up" name="reset" type="submit">
                RESET
              </button>
            </form>
          </div>

          <div class="overlay-container">
            <div class="overlay">
               <div class="overlay-panel overlay-right">
                <h1>Welcome</h1>
                <p>
                  Enter new password
                </p>
              </div>
            </div>
            </div>
            </div>
      </div>
    </div>
  </body>
</html>
