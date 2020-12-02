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
if(isset($_GET['ci'], $_GET['iv'], $_GET['im'], $_GET['r'])){
    $userinfo = getUserInfoLogin($conn, $_GET['im']);
    if($userinfo->num_rows > 0){
        $userinfo = $userinfo->fetch_assoc();
        if(setUserRole($conn, $_GET['ci'], $userinfo['id'], $_GET['r'])){
            header("Location: home.php");
        }else{
            echo setUserRole($conn, $_GET['ci'], $userinfo['id'], $_GET['r']);
        }
    }
}
if (isset($_GET['pf'])) {
    $name= $_GET['pf'];

    header('Content-Description: File Transfer');
    header('Content-Type: application/force-download');
    header("Content-Disposition: attachment; filename=\"" . basename($name) . "\";");
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($name));
    ob_clean();
    flush();
    readfile("your_file_path/".$name); //showing the path to the server where the file is to be download
    exit;

}
if(isset($_GET['m'])){
    if(isResetSessionExpired($_SESSION['reset_time']))
        header("Location: login.php?m=".$_GET['m']);
    else
        echo time()-$_SESSION['reset_time'];
}
?>