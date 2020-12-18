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
    if(isset($_POST['reset-btn'])){
        $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
        if(empty($username)){
            $errors = "Username or email required";
        }else{
            $userinfo = getUserInfoLogin($conn, $username);

            if($userinfo->num_rows > 0){
                $userinfo = $userinfo->fetch_assoc();
                $_SESSION['reset_time'] = time();

                sendMailReset($userinfo['email']);
            }else{
                $errors = "Can't find you";
            }
        }
    }
    if(isset($_POST['update-pass-btn'])){
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
        $re_password = filter_var($_POST["re-password"], FILTER_SANITIZE_STRING);
        if (empty($password)){
            $errors = "Password required";
        }elseif (empty($re_password)){
            $errors = "Re-password required";
        }elseif ($password != $re_password){
            $errors = "Password and re-password are not matched";
        }else{
            if(updatePassword($conn, $password, $_GET['m'])){
                header('Location: login.php');
            }else{
                $errors = 'fail';
            }
        }
    }
    /** =====================================CLICK POST FORM BUTTON ACTION=========================================== */
    if(isset($_POST['turn-in-btn'])){
        $target_dir = "uploads/";
        $target_file = $target_dir . $_FILES["turn-in-files"]["name"];
        $dateCreated = date('yy-m-d h:i:s');
        if (!move_uploaded_file($_FILES["turn-in-files"]["tmp_name"], $target_file)) {
            die("Sorry, there was an error uploading your file.");
        }else{
            insertStdFiles($conn, $target_file, $dateCreated, $_SESSION['active_postId'], $_SESSION['userId'], $_SESSION['active_classId']);
        }

    }
    if (isset($_POST["assignment-form-btn"])){
        $target_dir = "uploads/";
        $type = 2;
        $title = null;
        if(isset($_POST["title"])){
            $title = filter_var($_POST["title"], FILTER_SANITIZE_STRING);
            $type = 3;
        }
        $limitScore = null;
        $details = filter_var($_POST["details"], FILTER_SANITIZE_STRING);
        $dateCreated = date('yy-m-d h:i:s');
        $limitTime = null;
        if(isset($_POST["limit_score"])){
            if(!empty($_POST['limit_score'])){
                $limitScore = $_POST["limit_score"];
                $type = 1;
            }
        }
        if(isset($_POST["limit_time"])){
            if(!empty($_POST['limit_time'])){
                $limitTime = date('yy-m-d h:i:s', strtotime($_POST["limit_time"]));
                $type = 1;
            }
        }
        
        $category = null;
        if(isset($_POST["category"])){
            $category_tmp = $_POST["category"];
            if(!empty($category_tmp) && $type == 1){
                if(gettype($category_tmp) == 'string'){
                    insertTopic($conn, $category_tmp);
                    $category = $conn->insert_id;
                }else{
                    $category = $category_tmp;
                }
            }
        }
        if(empty($_POST['check_list_visibility'])){
            $errors = "Select students who can see your post please!";
        }else{
            if(insertPost($conn, $_SESSION['userId'], $title, $details, $type, $category,$limitScore , $dateCreated, $limitTime, 0,$_SESSION['active_classId'])){
                $postCurrId = $conn->insert_id;
                $check_list_visibility = $_POST['check_list_visibility'];
                foreach($_POST['check_list_visibility'] as $selected){
                    insertPostVisibility( $conn,$postCurrId,$selected,$_SESSION['active_classId']);
                }
                insertPostVisibility( $conn,$postCurrId,$_SESSION['userId'],$_SESSION['active_classId']);
                insertPostVisibility( $conn,$postCurrId,1,$_SESSION['active_classId']);
                
                $total_count = count($_FILES['files']['name']);
                if($total_count > 0){
                    for( $i=0 ; $i < $total_count ; $i++ ) {
                        $target_file = $target_dir . $_FILES["files"]["name"][$i];

                        if (!move_uploaded_file($_FILES["files"]["tmp_name"][$i], $target_file)) {
                            die("Sorry, there was an error uploading your file.");
                        }else{
                            insertPostLink($conn, $_FILES["files"]["name"][$i], $postCurrId);
                        }
                    }
                }
            }else{
                $errors = 'fail';
            }
                
        }
    }
    if(isset($_POST['post-public-comment-btn'])){
        $comment = filter_var($_POST['comment-content'], FILTER_SANITIZE_STRING);
        if(!empty($comment)){
            if(insertComment($conn, $_SESSION['userId'], $comment, $_SESSION['active_postId'], 1)){
                updateNumComments($conn, $_SESSION['active_postId'], getPostInfo($conn, $_SESSION['active_postId'])->fetch_assoc()['num_comments']+1);
            }
        }
    }
    if(isset($_POST['post-private-comment-btn'])){
        $comment = filter_var($_POST['comment-content'], FILTER_SANITIZE_STRING);
        if(!empty($comment)){
            if(insertComment($conn, $_SESSION['userId'], $comment, $_SESSION['active_postId'], 0)){
                updateNumComments($conn, $_SESSION['active_postId'], getPostInfo($conn, $_SESSION['active_postId'])->fetch_assoc()['num_comments']+1);
            }
        }
    }

    if(isset($_POST["remove-people-btn"])){
        if(!empty($_POST['check_list'])){
            foreach($_POST['check_list'] as $selected){
                removeUserRoleOfClass($conn, $_SESSION['active_classId'], $selected);
            }
        }
        header("Location: class.php?ci=".$_SESSION['active_classId']);
    }
    if(isset($_POST["remove-post-btn"])){
        $postId = $_SESSION["active_postId"];
        if(deleteVisibility($conn, $postId)&&deleteLink($conn, $postId)){
            deletePostById($conn, $postId);
        }
        header("Location: class.php?ci=".$_SESSION['active_classId']);
    }
    if(isset($_POST["edit-post-btn"])){
        $postId = $_SESSION["active_postId"];
        header("Location: post-form.php?ci=".$_SESSION['active_classId']."&pi=".$postId);
    }
    if(isset($_POST['add-student-btn'])){
        $invited_email = $_POST["invited-email"];
        sendMailInvite($invited_email, $_SESSION['active_classId'], 'yes', 3, $_SESSION['email']);
    }
    if(isset($_POST["create-class-btn"])){
        $subject = filter_var($_POST["subject"],FILTER_SANITIZE_STRING);
        $code = bin2hex(random_bytes(3));
        $semester = filter_var($_POST["semester"], FILTER_SANITIZE_STRING);
        $room = filter_var($_POST["room"], FILTER_SANITIZE_STRING);
        $create_date = date("yy-m-d");
        if(empty($subject)){
            $errors = "Subject required";
        }else{
            // code can be duplicated, so random code until code is unique.
            while(!insertClass($conn, $subject, $code, $semester, $room, $create_date)){
                $code= bin2hex(random_bytes(3));
            }
            $class_id = $conn->insert_id;
            $userId = $_SESSION["userId"];
            if(setUserRole($conn, $class_id, $userId, 2) && setUserRole($conn, $class_id, 1, 1)){
                header("Location:classes.php");
            }
        }
    }
    if(isset($_POST["join-class-btn"])){
        $code = filter_var($_POST["code"],FILTER_SANITIZE_STRING);
        if(empty($code)){
            $errors = "Code required";
        }else{
            if(searchClassByCode($conn, $code) != null){
                $classInfo = searchClassByCode($conn, $code)->fetch_assoc();
                if(getPeopleOfClassByRole($conn, $classInfo['id'], 2) != null){
                    $teachers = getPeopleOfClassByRole($conn, $classInfo['id'], 2);
                    while($teacher = $teachers->fetch_assoc()){
                        $teacherInfo = getUserInfo($conn, $teacher['user_id'])->fetch_assoc();
                        sendMailRequire($teacherInfo['email'], $_SESSION['email'], $classInfo['subject'], $classInfo['id'], 'yes',3);
                    }
                }
            }
        }
    }
    if(isset($_POST["edit-class-btn"])){
        $subject = filter_var($_POST["subject"],FILTER_SANITIZE_STRING);
        $semester = filter_var($_POST["semester"], FILTER_SANITIZE_STRING);
        $room = filter_var($_POST["room"], FILTER_SANITIZE_STRING);
        $class_id = $_SESSION["active_classId"];
        if(empty($subject)){
            $subject = $activeClassInfo['subject'];
        }
        if(empty($semester)){
            $semester = $activeClassInfo['semester'];
        }
        if (empty($room)){
            $room = $activeClassInfo['room'];
        }
        if(updateClass($conn, $class_id, $subject, $semester, $room)){
            header("Location:class.php?ci=".$class_id);
        }else{
            die("Can't update");
        }
    }
    if(isset($_POST["edit-post-info-btn"])){
        $postInfo = getPostInfo($conn, $_GET['pi'])->fetch_assoc();
        $target_dir = "uploads/";
        $title = filter_var($_POST["title"], FILTER_SANITIZE_STRING);
        $limitScore = $_POST['limit_score'];
        $details = filter_var($_POST["details"], FILTER_SANITIZE_STRING);
        $limitTime = date('yy-m-d h:i:s', strtotime($_POST["limit_time"]));
        if(isset($_POST["title"])){
            $title = filter_var($_POST["title"], FILTER_SANITIZE_STRING);
        }
        if(empty($_POST['limit_score'])){
            $limitScore = $postInfo['limit_score'];
        }
        if(empty($_POST['limit_time'])){
            $limitTime = $postInfo['limit_time'];
        }
        if(empty($_POST['details'])){
            $details = $postInfo['details'];
        }
        if(updatePost($conn, $postInfo['id'], $title, $details, $limitScore, $limitTime)){
            $total_count = count($_FILES['files']['name']);
            if($total_count > 0){
                for( $i=0 ; $i < $total_count ; $i++ ) {
                    $target_file = $target_dir . $_FILES["files"]["name"][$i];

                    if (!move_uploaded_file($_FILES["files"]["tmp_name"][$i], $target_file)) {
                        die("Sorry, there was an error uploading your file.");
                    }else{
                        insertPostLink($conn, $target_file, $postInfo['id']);
                    }
                }
            }
            header("Location:class.php?ci=".$postInfo['class_id']."&pi=".$postInfo['id']);
        }else{
            die("Can't update");
        }
    }
    if(isset($_POST["delete-btn"])){
        $classId = $_SESSION["active_classId"];
        deleteClassUserRole($conn, $classId);
        deleteClass($conn, $classId);
        header("Location:classes.php");
    }
?>
