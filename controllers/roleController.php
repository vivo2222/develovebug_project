<?php
    // require "controllers/sessionController.php";
    require ('authController.php');
    $classes_list = getClassesList($conn, $_SESSION['userId']);
    if(isset($_GET['s'])){
        $classes_list = searchClasses($conn, $_GET['s']);
    }else{
        if(isset($_GET['ci'])){
            $classId = $_GET['ci'];
            $activeClassUserRole = getUserRoleOfClass($conn, $classId, $_SESSION['userId']);
            if($activeClassUserRole != null){
                if(getClassInfo($conn, $classId)->num_rows > 0){
                    $activeClassInfo = getClassInfo($conn, $classId)->fetch_assoc();
                    $_SESSION['active_classId'] = $_GET['ci'];
                    $_SESSION['active_class_roleId'] = $activeClassUserRole['id'];
                    $teacher_list = getPeopleOfClassByRole($conn, $_SESSION['active_classId'], 2);
                    $student_list = getPeopleOfClassByRole($conn, $_SESSION['active_classId'], 3);
                    $all_people_material = getAllPeopleOfClass($conn, $_SESSION['active_classId']);
                    $all_people_announ = getAllPeopleOfClass($conn, $_SESSION['active_classId']);
                    $topic_list = getAllTopicsOfClass($conn, $_SESSION['active_classId'], 1);
                    $std_files_list = getStdFilesOfClass($conn, $_SESSION['active_classId']);
                }
            }else{
                unset($_GET['ci']);
                header('Location: classes.php');
            }
        }else{
            if(isset($_SESSION['active_class_roleId'],$_SESSION['active_classId'])){
                unset($_SESSION['active_classId'],$_SESSION['active_class_roleId']);
            }
        }
        if(isset($_GET['pi'])){
            $postId = $_GET['pi'];
            $activePostUserVisibility= checkUserVisibility($conn, $postId, $_SESSION['userId']);
            if($activePostUserVisibility){
                if(getPostInfo($conn, $postId)->num_rows > 0){
                    $activePostInfo = getPostInfo($conn, $postId)->fetch_assoc();
                    if($activePostInfo['user_id'] == $_SESSION['userId'] || $_SESSION['userId'] == 1)
                        $_SESSION['active_post_role'] = 1;
                    else
                        $_SESSION['active_post_role'] = 0;
                    $_SESSION['active_postId'] = $_GET['pi'];
                    // $teacher_list = getPeopleOfClassByRole($conn, $_SESSION['active_classId'], 2);
                    // $student_list = getPeopleOfClassByRole($conn, $_SESSION['active_classId'], 3);
                    
                    $topic_list = getAllTopicsOfClass($conn, $_SESSION['active_classId'], 1);
                }
            }else{
                unset($_GET['pi']);
                header("Location: classes.php");
            }
        }else{
            if(isset($_SESSION['active_post_role'],$_SESSION['active_postId'])){
                unset($_SESSION['active_post_role'],$_SESSION['active_postId']);

            }
        }
    }
    
    

?>
