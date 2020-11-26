<?php
    // require "controllers/sessionController.php";
    require ('authController.php');
    $classes_list = getClassesList($conn, $_SESSION['userId']);
    if(isset($_GET['classId'])){
        $classId = $_GET['classId'];
        $activeClassUserRole = getUserRoleOfClass($conn, $classId, $_SESSION['userId']);
        if($activeClassUserRole != null){
            if(getClassInfo($conn, $classId)->num_rows > 0){
                $_SESSION['active_classId'] = $_GET['classId'];
                $_SESSION['active_roleId'] = $activeClassUserRole['id'];
                $activeClassInfo = getClassInfo($conn, $classId)->fetch_assoc();
                $teacher_list = getPeopleOfClassByRole($conn, $_SESSION['active_classId'], 2);
                $student_list = getPeopleOfClassByRole($conn, $_SESSION['active_classId'], 3);
            }
        }else{
            unset($_GET['classId']);
            header('Location: home.php');
        }
    }

?>
