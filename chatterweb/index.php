<?php
session_start();
if(!isset($_SESSION['username'])){



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CHATTER-WEB</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="APP/auth.php" autocomplete="off" class="sign-in-form" method="post">
              <div class="logo">
                <img src="./img/CHATTER.png" alt="easyclass" />
                <h4>BE A GOSSIP</h4>
              </div>

              <div class="heading">
                <h2>Welcome Back</h2>
                <h6>Not registred yet?</h6>
                <a href="#" class="toggle">Sign up</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                
                    class="input-field"
                    autocomplete="off"
                    name="username"
                
                  />
                  <label>Name</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                  
                    class="input-field"
                    autocomplete="off"
                   name="password"
                  />
                  <label>Password</label>
                </div>

                <input type="submit" value="Sign In" class="sign-btn" />

                <p class="text">
                  Forgotten your password or you login datails?
                  <a href="#">Get help</a> signing in
                </p>
              </div>
            </form>
<!--   form for signup-->
            <form action="APP/signup.php" autocomplete="off" class="sign-up-form"method="post"enctype="multipart/form-data">
              <div class="logo">
                <img src="./img/chatter.png" alt="easyclass" />
                <h4></h4>
              </div>

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="#" class="toggle">Sign in</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    name="name"
                  />
                  <label>Name</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="text"
                    class="input-field"
                    autocomplete="off"
                    
                    name="username"
                  />
                  <label>User Name</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                     
                    name="password"
                  />
                  <label>Password</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="file"
                  
                    class="input-field"
  
                    name="p_p"
                  />
                  <label>profile picture</label>
                </div>
                <input type="submit" value="Sign Up" class="sign-btn" />

                <p class="text">
                  By signing up, I agree to the
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p>
              </div>
            </form>
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="./img/image1.png" class="image img-1 show" alt="" />
              <img src="./img/image2.png" class="image img-2" alt="" />
              <img src="./img/image3.png" class="image img-3" alt="" />
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                  <h2>MAKE A NEW FRIENDS</h2>
                  <h2>Customize as you LIKE</h2>
                  <h2>Invite YOUR PEOPLE TO GOOSIP</h2>
                </div>
              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="app.js"></script>
  </body>
</html>
<?php

}

else{
    HEADER("Location:home.php");
   
    exit;
}

?>