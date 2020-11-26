<?php
    require ('dao/config.php');
    global $conn;
    $username = "";
    $password = "";
    $re_password = "";
    $full_name = "";
    $email = "";
    $birth = "";
    $phone_number = "";
    $errors = "";
    $token = "";
    $verified = 0;

    /** =====================================CLICK REGISTER BUTTON ACTION=========================================== */
    if(isset($_POST["signup-btn"])){
        $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
        $re_password = filter_var($_POST["re-password"], FILTER_SANITIZE_STRING);
        $full_name = filter_var($_POST["fullname"], FILTER_SANITIZE_STRING);
        $email = $_POST["email"];
        $birth = $_POST["birthday"];
        $phone_number = filter_var($_POST["phone-number"], FILTER_SANITIZE_NUMBER_INT);
        $errors = "false";
        if(empty($username)){
            $errors = "Username required";
        }elseif (checkUsernameExisted($conn, $username)){
            $errors = "This username have already existed";
        }elseif (empty($password)){
            $errors = "Password required";
        }elseif (empty($re_password)){
            $errors = "Re-password required";
        }elseif ($password != $re_password){
            $errors = "Password and re-password are not matched";
        }elseif (empty($full_name)){
            $errors = "Fullname required";
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors = $email;
        }elseif (checkEmailExisted($conn, $email)){
            $errors = "This email have already existed";
        }elseif (empty($birth)){
            $errors = "Birthday required";
        }elseif (!filter_var($phone_number, FILTER_VALIDATE_INT) === false){
            $errors = "Phone number is invalid";
        }else{
            $token = bin2hex(random_bytes(50));
            if(insertUser($conn,$username, $password, $full_name, $email, $birth, $phone_number, $token, $verified)) {
                $_SESSION["verified"] = $verified;
                $_SESSION["verify_process"] = 1;
                if(!sendMailVerify($email, $token)){
                    $errors = "Can't send email";
                    session_destroy();
                }
            }
            else
                $errors = $conn->error;
            
        }


    }
    /** =====================================CLICK LOGIN BUTTON ACTION=========================================== */
    if (isset($_POST["login-btn"])){
        $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
        if(empty($username)){
            $errors = "Username or email required";
        }elseif (empty($password)){
            $errors = "Password required";
        }else{
            $userinfo = getUserInfoLogin($conn, $username);

            if($userinfo->num_rows > 0){
                $userinfo = $userinfo->fetch_assoc();
                if(password_verify($password, $userinfo["password"])){
                    if($userinfo["verified"] === 1) {
                        $_SESSION["userId"] = $userinfo["id"];
                        $_SESSION["username"] = $userinfo["username"];
                        $_SESSION["password"] = $userinfo["password"];
                        $_SESSION["fullname"] = $userinfo["fullname"];
                        $_SESSION["email"] = $userinfo["email"];
                        $_SESSION["birthday"] = $userinfo["birth"];
                        $_SESSION["phonenum"] = $userinfo["tel"];
                        $_SESSION["token"] = $userinfo["token"];
                        $_SESSION["verified"] = $userinfo["verified"];
                        $_SESSION["login"] = "1";
                        if($_SESSION["userId"] === 1)
                            header("Location: admin.php");
                        else
                            header("Location: home.php");
                    }else{
                        $errors = "This account have been not verified";
                    }
                }else{
                    $errors = "Wrong password";
                }
            }else{
                $errors = "Can't find you";
            }
        }
    }

    /** =====================================CLICK POST FORM BUTTON ACTION=========================================== */

    if (isset($_POST["post-form-btn"])){
        $target_dir = "uploads/";
        $target_file = $target_dir . $_FILES["fileToUpload"]["name"];

        if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            die("Sorry, there was an error uploading your file.");
        }

    }

    if(isset($_POST["remove-people-btn"])){
        if(!empty($_POST['check_list'])){
            foreach($_POST['check_list'] as $selected){
                removeUserRoleOfClass($conn, $_SESSION['active_classId'], $selected);
            }
        }
        header("Location: class.php?classId=".$_SESSION['active_classId']);
    }
    if(isset($_POST['add-people-btn'])){
        $invited_email = $_POST["invited-email"];
        $userinfo = getUserInfoLogin($conn, $invited_email);

        if($userinfo->num_rows > 0){
            $userinfo = $userinfo->fetch_assoc();
            if(getUserRoleOfClass($conn, $_SESSION['active_classId'], $userinfo['id']) == null){
                if(sendMailInvite($invited_email, $_SESSION['active_classId'], 'yes', $_SESSION['email'])){
                    echo 'Invited';
                }else{
                    echo 'Fail';
                }
            }else{
                echo 'This user have already joined!';
            }
        }
    }
    if(isset($_POST["create-class-btn"])){
        $subject = filter_var($_POST["subject"],FILTER_SANITIZE_STRING);
        $code = rand_code(6);
        $semester = filter_var($_POST["semester"], FILTER_SANITIZE_STRING);
        $room = filter_var($_POST["room"], FILTER_SANITIZE_STRING);
        $create_date = date("yy-m-d");
        if(empty($subject)){
            $errors = "Subject required";
        }
        else if(empty($semester)){
            $errors = "Semester required";
        }
        else if (empty($room)){
            $errors = "Room required";
        }
        else{
            while(!insertClass($conn, $subject, $code, $semester, $room, $create_date)){
                $code= rand_code(6);
            }
            $class_id = $conn->insert_id;
            $userId = $_SESSION["userId"];
            addClassUserRole($conn, $class_id, $userId, 2);
            addClassUserRole($conn, $class_id, $userId, 1);
            header("Location:classes.php");
        }
    }
    if(isset($_POST["edit-class-btn"])){
        $subject = filter_var($_POST["subject"],FILTER_SANITIZE_STRING);
        $semester = filter_var($_POST["semester"], FILTER_SANITIZE_STRING);
        $room = filter_var($_POST["room"], FILTER_SANITIZE_STRING);
        $class_id = $_SESSION["active_classId"];
        if(empty($subject)){
            $errors = "Subject required";
        }
        else if(empty($semester)){
            $errors = "Semester required";
        }
        else if (empty($room)){
            $errors = "Room required";
        }
        else{
            editClass($conn, $class_id, $subject, $semester, $room);
            header("Location:class.php?classId=".$_SESSION["active_classId"]);
        }
    }
    if(isset($_POST["delete-btn"])){
        $classId = $_SESSION["active_classId"];
        deleteClassUserRole($conn, $classId);
        deleteClass($conn, $classId);
        header("Location:classes.php");
    }
    if(isset($_POST["join-class-btn"])){
        $code = $_POST["classCode"];
        $classId = getClassId($conn, $code);
        $userId = $_SESSION["userId"];
    }
?>
