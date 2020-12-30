<?php
    session_start();
    if(isset($_SESSION["login"])){
        header("location: home.php");
        exit();
    }
    require "../controllers/authController.php";
    $titleForm = 'Login';
    if(isset($_GET['rs'])||isset($_GET['m'])){
        $titleForm = 'Reset Password';
    }

//    $errors = "";
?>
<!doctype html>
<html lang="en">
<?php 
    require_once "head-tag.php";
?>
<body class="form-page">
<img src="../assets/img/main-bg.jpg" alt="tdt_background">
<div class="container-fluid">
    <div class="row">
        <div class="form-div col-md-4 offset-md-4">
            <form action="" method="post" id="login-form">
                <div class="form-title"><h3 class="text-center"><?php echo $titleForm;?></h3></div>
                <?php if ($errors != "") {?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $errors ?>
                    </div>
                <?php  }if(!isset($_GET['m'])){?>
                <div class="form-group">
                    <label for="username">Email or Username</label><br>
                    <input type="text" name="username" placeholder="Enter your email or username" class="form-input" required>
                </div>
                <?php } if(!isset($_GET['rs']) || isset($_GET['m'])){?>
                <div class="form-group">
                    <label for="password">Password</label><br>
                    <input type="password" name="password" placeholder="Enter your password" class="form-input" required>
                </div>
                <?php }if(isset($_GET['m'])){?>
                <div class="form-group">
                    <label for="password">Re-Password</label><br>
                    <input type="password" name="re-password" placeholder="Enter your re-password" class="form-input" required>
                </div>
                <?php }?>
                <div class="form-group">
                    <?php if(!(isset($_GET['rs'])||isset($_GET['m']))){?>
                    <button type="submit" name="login-btn" class="btn btn-block btn-primary btn-lg">Login</button>
                    <?php } else if(isset($_GET['rs'])){ ?>
                        <button type="submit" name="reset-btn" class="btn btn-block btn-primary btn-lg">Send mail</button>
                    <?php } else if(isset($_GET['m'])){ ?>
                        <button type="submit" name="update-pass-btn" class="btn btn-block btn-primary btn-lg">Change pass</button>
                    <?php } ?>
                </div>
                <p class="text-center">Not yet a member? <a href="index.php">Sign up</a></p>
                <?php if(!isset($_GET['rs'])){?>
                    <p class="text-center"><a href="login.php?rs=1">Forgot password? </a></p>
                <?php }?>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript" src="../assets/js/main.js"></script>



