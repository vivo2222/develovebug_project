<?php
    session_start();
    require ("dao/config.php");
    global $conn;
    if(isset($_GET['classId'], $_GET['isInvited'], $_GET['email'], $_GET['role'])){
        $userinfo = getUserInfoLogin($conn, $_GET['email']);
        if($userinfo->num_rows > 0){
            $userinfo = $userinfo->fetch_assoc();
            if(setUserRoleOfClass($conn, $_GET['classId'], $userinfo['id'], $_GET['role'])){
                header("Location: home.php");
            }else{
                echo setUserRoleOfClass($conn, $_GET['classId'], $userinfo['id'], $_GET['role']);
            }
        }
    }
?>