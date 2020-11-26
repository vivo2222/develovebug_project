<?php
    session_start();
    if(isset($_SESSION["login"])){
        header("location: home.php");
        exit();
    }
    require "controllers/authController.php";
//    $errors = "";
?>
<!doctype html>
<html lang="en">
<?php 
    require_once "head-tag.php";
?>
<body class="form-page">
<img src="img/main-bg.jpg" alt="tdt_background">
<div class="container-fluid">
    <div class="row">
        <div class="form-div col-md-4 offset-md-4">
            <form action="" method="post" id="login-form">
                <div class="form-title"><h3 class="text-center">Login</h3></div>
                <?php if ($errors != "") {?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $errors ?>
                    </div>
                <?php  }?>
                <div class="form-group">
                    <label for="username">Email or Username</label><br>
                    <input type="text" name="username" placeholder="Enter your email or username" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label><br>
                    <input type="password" name="password" placeholder="Enter your password" class="form-input" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="login-btn" class="btn btn-block btn-primary btn-lg">Login</button>
                </div>
                <p class="text-center">Not yet a member? <a href="index.php">Sign up</a></p>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript" src="main.js"></script>



