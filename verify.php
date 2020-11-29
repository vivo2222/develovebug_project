<?php
session_start();
require ("dao/config.php");
if(isset($_GET["token"])){
    global $conn;
    $token = $_GET["token"];
    $verified = 0;
    if( $conn->connect_error){
        die("Fail to connect database".$conn->connect_error);
    } else{
        $sql = $conn->prepare("SELECT token, verified FROM users WHERE token = ? AND verified = ?");
        $sql->bind_param("si", $token, $verified);
        $sql->execute();
        $result = $sql->get_result();
        $userinfo = $result->fetch_assoc();
        if ($userinfo != null) {
            $update_sql = $conn->prepare("UPDATE users SET verified = 1 WHERE token = ?");
            $update_sql->bind_param("s", $token);
            $is_updated = $update_sql->execute();
            if($is_updated){
                $_SESSION["verify_process"] = "3";
                $_SESSION["verified"] = 1;
            }
        }else{
            $_SESSION["verify_process"] = "2";
        }
    }
//    echo $conn->error;
    header("Location: index.php");
}
if(isset($_GET['classId'], $_GET['isInvited'], $_GET['email'], $_GET['role'])){
    $userinfo = getUserInfoLogin($conn, $_GET['email']);
    if($userinfo->num_rows > 0){
        $userinfo = $userinfo->fetch_assoc();
        if(setUserRole($conn, $_GET['classId'], $userinfo['id'], $_GET['role'])){
            header("Location: home.php");
        }else{
            echo setUserRole($conn, $_GET['classId'], $userinfo['id'], $_GET['role']);
        }
    }
}
?>