<?php
    session_start();
    if(isset($_SESSION["login"])){
        header("location: home.php");
        exit();
    }
    require "../controllers/authController.php";
?>
<!doctype html>
<html lang="en">
<?php 
    require_once "head-tag.php";
?>
<body class="form-page ">
    <img src="../assets/img/main-bg.jpg" alt="tdt_background">
    <div class="container-fluid">
        <div class="row">
            <?php if(!isset($_SESSION["verified"])){ ?>
            <div class="form-div col-md-4 offset-md-4">
                <form action="" method="post" id="signup-form">
                    <div class="form-title"><h3 class="text-center">Register</h3></div>
                    <?php if (!empty($errors)) {?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $errors ?>
                        </div>
                    <?php  }?>
                    <div class="form-group">
                        <label for="username">Username:</label><br>
                        <input type="text" name="username" class=" form-input" placeholder="Enter your username or email" >
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label><br>
                        <input type="password" name="password" class=" form-input" placeholder="Enter your password" >
                    </div>
                    <div class="form-group">
                        <label for="re-password">Re-Password:</label><br>
                        <input type="password" name="re-password" class=" form-input" placeholder="Enter your password again" >
                    </div>
                    <div class="form-group">
                        <label for="fullname">Full name:</label><br>
                        <input type="text" name="fullname" class=" form-input" placeholder="Enter your full name" >
                    </div>
                    <div class="form-group">
                        <label for="birthday">Date of birth:</label><br>
                        <input type="date" name="birthday" class=" form-input" placeholder="Enter your date of birth" >
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label><br>
                        <input type="email" name="email" class=" form-input" placeholder="Enter your email" >
                    </div>
                    <div class="form-group">
                        <label for="tel">Phone number:</label><br>
                        <input type="tel" name="phone-number" placeholder="Enter your phone number" class=" form-input">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="signup-btn" class="btn btn-block btn-primary btn-lg">Sign up</button>
                    </div>
                    <p class="text-center">Aldready a member? <a href="login.php">Sign in</a></p>
                </form>
            </div>
            <?php } ?>
            <?php if(isset($_SESSION["verified"]) && isset($_SESSION['verify_process'])){ ?>
            <div class="verify-box col-md-4 offset-md-4 form-div">
                <?php if($_SESSION["verify_process"] == 3){?>
                <div class="alert alert-success" role="alert">
                    Your account have already verified ! You can login now !! <a href="login.php">Login</a>
                </div>
                <?php } ?>
                <?php if($_SESSION["verify_process"] == 2){?>
                <div class="alert alert-danger" role="alert">
                    Can't verify you ! <a href="logout.php">Sign up again!</a>
                </div>
                <?php } ?>
                <?php if($_SESSION["verify_process"] == 1){?>
                <div class="alert alert-warning" role="alert">
                    You need to verify your account.
                    Sign in your email account and click on verification link we just emailed you at <strong><?php echo $email ?></strong> or
                    <a href="logout.php">Sign up again!</a>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
<script type="text/javascript" src="../assets/js/main.js"></script>
