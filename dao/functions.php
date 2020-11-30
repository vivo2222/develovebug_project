<?php
    function getUserRoleOfClass($conn,$classId, $userId){
        $sql =  $conn->prepare("SELECT role_id FROM class_user_role WHERE user_id = ? AND class_id = ? ");
        $sql->bind_param("ii", $userId, $classId);
        $user_role = null;
        if($sql->execute()){
            $result = $sql->get_result();
            if($result->num_rows > 0){
                $user_role = $result->fetch_assoc();

                $sql =  $conn->prepare("SELECT * FROM roles WHERE id = ?");
                $sql->bind_param("i", $user_role["role_id"]);
                if($sql->execute()){
                    $result = $sql->get_result();
                    $user_role = $result->fetch_assoc();
                }
            }
        }
        return $user_role;
    }

    function setUserRole($conn, $classId, $userId, $roleId){
        $sql =  $conn->prepare("INSERT INTO class_user_role(class_id, user_id, role_id) VALUES (?, ?, ?)");
        $sql->bind_param("iii",$classId, $userId, $roleId);
        $isInserted = $sql->execute();
        return $isInserted;
    }
    function getUserInfoLogin($conn,$user_login_info){
        $sql =  $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $sql->bind_param("ss", $user_login_info, $user_login_info);
        $result = null;
        if($sql->execute()){
            $result = $sql->get_result();
        }
        return $result;
    }
    
    function getPeopleOfClassByRole($conn, $classId, $roleId){
        $sql =  $conn->prepare("SELECT * FROM class_user_role WHERE class_id = ? AND role_id = ? ");
        $sql->bind_param("ii", $classId, $roleId);
        $result = null;
        if($sql->execute()){
            $result = $sql->get_result();
        }
        return $result;
    }
    function getClassInfo($conn, $classId){
        $sql =  $conn->prepare("SELECT * FROM classes WHERE id = ?");
        $sql->bind_param("i", $classId);
        $result = null;
        if($sql->execute()){
            $result = $sql->get_result();
        }
        return $result;
    }
    function getUserInfo($conn, $userId){
        $sql =  $conn->prepare("SELECT * FROM users WHERE id = ?");
        $sql->bind_param("i", $userId);
        $result = null;
        if($sql->execute()){
            $result = $sql->get_result();
        }
        return $result;
    }
    function getTeacherInfo($conn, $classId){
        $roleId = 2;
        $sql =  $conn->prepare("SELECT * FROM class_user_role WHERE class_id = ? AND role_id = ?");
        $sql->bind_param("ii", $classId, $roleId);
        $teacher_info  = null;
        if($sql->execute()){
            $result = $sql->get_result();
            if($result->num_rows > 0){
                $teacher_info = $result->fetch_assoc();
                $sql =  $conn->prepare("SELECT * FROM users WHERE id = ?");
                $sql->bind_param("i", $teacher_info['user_id']);
                if($sql->execute()){
                    $result = $sql->get_result();
                    $teacher_info = $result->fetch_assoc();
                }
            }
        }
        return $teacher_info;

    }
    function getAllPeopleOfClass($conn, $classId){
        $sql =  $conn->prepare("SELECT * FROM class_user_role WHERE class_id = ?");
        $sql->bind_param("i", $classId);
        $result = null;
        if($sql->execute()){
            $result = $sql->get_result();
        }
        return $result;
    }
    function checkEmailExisted($conn, $email){
        $sql =  $conn->prepare("SELECT * FROM users WHERE email = ?");
        $sql->bind_param("s", $email);
        if($sql->execute()){
            $result = $sql->get_result();
            if($result->num_rows > 0)
                return TRUE;
            return FALSE;
        }
        return FALSE;
        
    }
    function checkUsernameExisted($conn, $username){
        $sql =  $conn->prepare("SELECT * FROM users WHERE username = ?");
        $sql->bind_param("s", $username);
        if($sql->execute()){
            $result = $sql->get_result();
            if($result->num_rows > 0)
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }
    function insertUser($conn,$username, $password, $fullname, $email, $birth, $phone, $token, $verified){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql =  $conn->prepare("INSERT INTO users(username, password, fullname, email, birth, tel, token, verified) VALUES(?,?,?,?,?,?,?,?)");
        $sql->bind_param("sssssssi", $username, $password, $fullname, $email, $birth, $phone, $token, $verified);
        $isInserted = $sql->execute();
        return $isInserted;
    }
    function insertPost($conn, $userId, $title, $details, $type, $topic, $limitScore, $dateCreated, $limitTime, $numComments, $numViews, $classId){
        $sql =  $conn->prepare("INSERT INTO posts(user_id, title, details, type, topic, limit_score, date_created, limit_time, num_comments, num_views, class_id) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $sql->bind_param("issiiissiii", $userId, $title, $details, $type, $topic, $limitScore, $dateCreated, $limitTime, $numComments, $numViews, $classId);
        $isInserted = $sql->execute();
        return $isInserted;
    }
    function insertClass($conn, $subject, $code, $semester, $room, $create_date){
        $sql = $conn->prepare("INSERT INTO classes(subject, code, semester, room, created_date) VALUES (?, ?, ?, ?, ?)");
        $sql->bind_param('sssss', $subject, $code, $semester, $room, $create_date);
        $isInserted = $sql->execute();
        return $isInserted;
    }
    function insertPostVisibility($conn, $postId, $userId, $classId){
        $sql = $conn->prepare("INSERT INTO post_visibility(post_id, user_id, class_id) VALUES (?, ?, ?)");
        $sql->bind_param('iii', $postId, $userId, $classId);
        $isInserted = $sql->execute();
        return $isInserted;
    }
    function insertPostLink($conn, $path, $postId){
        $sql = $conn->prepare("INSERT INTO links(path, post_id) VALUES (?, ?)");
        $sql->bind_param('si', $path, $postId);
        $isInserted = $sql->execute();
        return $isInserted;
    }
    function insertTopic($conn, $name){
        $sql = $conn->prepare("INSERT INTO topics(name) VALUES (?)");
        $sql->bind_param('s', $name);
        $isInserted = $sql->execute();
        return $isInserted;
    }
    function randCode( $length ) {  
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";  
        $size = strlen( $chars );
        $str = "";  
        for( $i = 0; $i < $length; $i++ ) {  
        $str= $str . $chars[ rand( 0, $size - 1 ) ];  
        }
        return $str;
    }
    function updateClass($conn, $classId, $subject, $semester, $room){
        $sql = $conn->prepare("UPDATE classes SET subject = ?,semester = ?,room = ? WHERE id = ?");
        $sql->bind_param('sssi', $subject, $semester, $room, $classId);
        $isUpdated = $sql->execute();
        return $isUpdated;
    }
    function deleteClass($conn, $classId){
        $sql = $conn->prepare("DELETE FROM classes WHERE id = ?");
        $sql->bind_param("i",$classId);
        $isDeleted = $sql->execute();
        return $isDeleted;
    }
    function deleteClassUserRole($conn, $classId){
        $sql = $conn->prepare("DELETE FROM class_user_role WHERE class_id = ?");
        $sql->bind_param("i", $classId);
        $isDeleted = $sql->execute();
        return $isDeleted;
    }
    function sendMailVerify($email, $token){
        $subject = "Verification classroom account.";
        $to = $email;
        $msg = "<a href='http://localhost/develovebug_project/verify.php?token=$token' style='color: #00316b; font-weight: bold;'> Register now! </a>";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: TDTU CLASSROOM \r\n";
        $is_sent = mail($to,$subject,$msg,$headers);
        return $is_sent;
    }
    function sendMailInvite($email, $classId, $isInvited, $roleId, $userMail){
        $subject = "Verification classroom account.";
        $to = $email;
        $msg = "<h3>You are invited to join a class by $userMail</h3>";
        $msg .= "<a href='http://localhost/develovebug_project/verify.php?classId=$classId&isInvited=$isInvited&email=$email&role=$roleId' style='color: #00316b; font-weight: bold;'> Join now! </a>";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: TDTU CLASSROOM \r\n";
        $is_sent = mail($to,$subject,$msg,$headers);
        return $is_sent;
    }
    
    function getClassesList($conn, $userId){
        $sql =  $conn->prepare("SELECT * FROM class_user_role WHERE user_id = ? ");
        $sql->bind_param("i", $userId);
        $result = null;
        if($sql->execute()){
            $result = $sql->get_result();
        }
        return $result;
    }
    function removeUserRoleOfClass($conn, $classId, $userId){
        $sql =  $conn->prepare("DELETE FROM class_user_role WHERE class_id = ? AND user_id = ?");
        $sql->bind_param("ii",$classId, $userId);
        $isRemoved = $sql->execute();
        return $isRemoved;
    }
    function insertStudent($conn, $classId, $userId, $userRole){
        $sql = $conn->prepare("INSERT INTO class_user_role(class_id, user_id, role_id) VALUES(?, ?, ?)");
        $sql->bind_param("iii",$classId, $userId, $userRole);
        $isInserted = $sql->execute();
        return $isInserted;
    }
    function getClassIdByCode($conn, $code){
        $sql = $conn->prepare("SELECT id FROM classes WHERE code = ?");
        $sql->bind_param("s", $code);
        $query = $sql->execute();
        $result = $query->get_result();
        $class = $result->fetch_assoc();
        return $class["id"];
    }
    function updateUserInfo($conn, $username, $password, $email, $fullname, $birth, $tel, $token, $verified, $avatar){
        $sql = $conn->prepare("UPDATE classes SET username = ?, password = ?, email = ?, fullname = ?, birth = ?, tel = ?, token = ?, verified = ?, avatar = ? WHERE id = ?");
        $sql->bind_param('sssssssis', $username, $password, $email, $fullname, $birth, $tel, $token, $verified, $avatar);
        $isUpdated = $sql->execute();
        return $isUpdated;
    }
    function updatePost($conn, $postId, $title, $details, $type, $topic, $limit_score, $limit_time){
        $sql = $conn->prepare("UPDATE posts SET title = ?, details = ?, type = ?, topic = ?, limit_score = ?, limit_time = ? WHERE id = ?");
        $sql->bind_param("", $title, $details, $type, $topic, $limit_score, $limit_time, $postId);
        $isUpdated = $sql->execute();
        return $isUpdated;
    }
    function deletePostById($conn, $id){
        $sql = $conn->prepare("DELETE FROM posts WHERE id = ?");
        $sql->bind_param("i", $id);
        $isDeleted = $sql->execute();
        return $isDeleted;    
    }
    function getPostInfo($conn, $postId){
        $sql =  $conn->prepare("SELECT * FROM posts WHERE id = ?");
        $sql->bind_param("i", $postId);
        $result = null;
        if($sql->execute()){
            $result = $sql->get_result();
        }
        return $result;
    }
    function searchClassByCode($conn, $code){
        $sql = $conn->prepare("SELECT * FROM classes WHERE code = ?");
        $sql->bind_param("s", $code);
        $result = null;
        if($sql->execute()){
            $result = $sql->get_result();
        }
        return $result;
    }
    function getPostLinkById($conn, $post_id){
        $sql = $conn->prepare("SELECT * FROM links WHERE post_id = ?");
        $sql->bind_param("i", $post_id);
        $result = null;
        if($sql->execute()){
            $result = $sql->get_result();
        }
        return $result;
    }
    function getAssignmentsListOfClass($conn, $type, $classId){
        $sql = $conn->prepare("SELECT * FROM posts WHERE type = ? AND class_id = ?");
        $sql->bind_param("ii", $type, $classId);
        $result = null;
        if ($sql->execute()){
            $result = $sql->get_result();
        }
        return $result;
    }
    function getAllAssignmentsList($conn, $type){
        $sql = $conn->prepare("SELECT * FROM posts WHERE type = ?");
        $sql->bind_param("i", $type);
        $result = null;
        if ($sql->execute()){
            $result = $sql->get_result();
        }
        return $result;
    }
    function getPostIdbyClassIdAndUserId($conn, $user_id, $class_id){
        $sql = $conn->prepare("SELECT * FROM post_visibility WHERE user_id = ? and class_id = ?");
        $sql->bind_param("ii",$user_id, $class_id);
        $result = null;
        if($sql->execute()){
            $result = $sql->get_result();
        }
        return $result;
    }
    function deleteLink($conn, $id){
        $sql = $conn->prepare("DELETE FROM links WHERE ID = ?");
        $sql->bind_param("i", $id);
        $isDeleted = $sql->execute();
        return $isDeleted;
    }
    function deleteVisibility($conn, $post_id){
        $sql = $conn->prepare("DELETE FROM post_visibility WHERE post_id = ?");
        $sql->bind_param("i", $post_id);
        $isDeleted = $sql->execute();
        return $isDeleted;
    }
    function updatePassword($conn, $password, $user_id){
        $sql = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        $sql->bind_param("si", $password, $user_id);
        $isUpdated = $sql->execute();
        return $isUpdated;
    }
    function getAllTopicsOfClass($conn, $class_id, $type){
        $sql = $conn->prepare("SELECT * FROM posts WHERE class_id = ? and type = ?");
        $sql->bind_param("ii", $class_id, $type);
        $result = null;
        if($sql->execute()){
            $result = $sql->get_result();
        }
        return $result;
    }
    function getTopicInfo($conn, $topicId){
        $sql = $conn->prepare("SELECT * FROM topics WHERE id = ?");
        $sql->bind_param("i", $topicId);
        $result = null;
        if($sql->execute()){
            $result = $sql->get_result();
        }
        return $result;
    }
?>