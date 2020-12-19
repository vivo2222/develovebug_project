<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }
    require "controllers/roleController.php";
    if(!isset($_SESSION['active_class_roleId'])){
        header('Location: classes.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<?php require 'head-tag.php';?>

<body>
    <div class="background-cover"></div>
    <?php require 'create-form.php';?>
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Class Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form action="" method="post" class="create">
                    <div class="field">
                        <label for="subject">Subject</label>
                        <input id="subject" type="text" name="subject" placeholder="Subject" value="<?php echo $activeClassInfo['subject']?>" >
                    </div>
                    <div class="field">
                        <label for="semester">Semester</label>
                        <input id="semester" type="text" name="semester" placeholder="Semester" value="<?php echo $activeClassInfo['semester']?>" >
                    </div>
                    <div class="field">
                        <label for="room">Room</label>
                        <input id="room" type="text" name="room" placeholder="Room" value="<?php echo $activeClassInfo['room']?>" >
                    </div>
                    <div class="field">
                        <p><label for="code">Code</label></p>
                        <p><input id="code" type="text" name="code" placeholder="Code" readonly=readonly value="<?php echo $activeClassInfo['code']?>"></p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="edit-class-btn" class="btn btn-primary">Save change</button>
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>  
    <div class="modal fade" id="staticBackdrop2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Class Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <p>Are you sure about that?</p>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="confirm" name="delete-btn" class="btn btn-primary" data-dismiss="model">Confirm</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop1" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Invite people</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form method="POST" action="">
                    <div class="modal-body">
                        Code : <i><?php echo $activeClassInfo['code']; ?></i>
                        <p>Or send mail to invite, type email below</p>
                        <input type="text" class="invited-email" name="invited-email">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="add-student-btn">Save change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="wrap" class="wrap-nicescroll">
        <?php require "nav.php"?>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 row">
                        <h1 class="col-md-6">
                        <?php
                            echo $activeClassInfo['subject'];
                        ?>
                        <?php if($_SESSION['active_class_roleId'] == 2 || $_SESSION['active_class_roleId'] == 1){?>
                        <span class="class-alter-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                            </svg>
                            <ul class="list-group">
                                <li class="list-group-item" data-toggle="modal" data-target="#staticBackdrop">Edit class</li>
                                <li class="list-group-item" data-toggle="modal" data-target="#staticBackdrop2">Remove class</li>
                            </ul>
                        </span>
                        <?php }?>
                        </h1>
                        <div class="crumbs col-md-6">
                            <a href="home.php">Home</a>
                            <span class="crumbs-span">/</span>
                            <a href="classes.php">Classes</a>
                            <span class="crumbs-span">/</span>
                            <span class="current">
                            <?php
                                echo $activeClassInfo['subject'];
                            ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="q-main-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 class-tabs">
                        <ul class="tab-title nav nav-tabs justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item active" role="presentation">
                                <a class="nav-link active" id="class-tab" data-toggle="tab" href="#class" role="tab"
                                    aria-controls="home" aria-selected="true">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-collection-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7z"/>
                                        <path fill-rule="evenodd" d="M2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z"/>
                                    </svg>
                                    <span class="hidden-xs">Stream</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="question-tab" data-toggle="tab" href="#question" role="tab"
                                    aria-controls="profile" aria-selected="false">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                    <span class="hidden-xs">Classworks</span>    
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="response-tab" data-toggle="tab" href="#response" role="tab"
                                    aria-controls="contact" aria-selected="false">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                                    </svg>
                                    <span class="hidden-xs">People</span>
                                </a>
                            </li>
                            <?php if($_SESSION['active_class_roleId'] == 2 || $_SESSION['active_class_roleId'] == 1){?>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="deadline-tab" data-toggle="tab" href="#deadline" role="tab"
                                    aria-controls="contact" aria-selected="false">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-line-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"/>
                                    </svg>
                                    <span class="hidden-xs">Score</span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active class-tab" id="class" role="tabpanel" aria-labelledby="class-tab">
                                <?php 
                                    $posts_list = getAllPostsOfClass($conn, $activeClassInfo['id']);
                                    if($posts_list->num_rows > 0){
                                        while($postsList = $posts_list->fetch_assoc()){ 
                                            if(getPostInfo($conn, $postsList["id"])->num_rows > 0){
                                                $postInfoArray = getPostInfo($conn, $postsList["id"])->fetch_assoc();
                                                if(checkUserVisibility($conn, $postInfoArray['id'], $_SESSION['userId'])){
                                ?>
                                <div class="accordion classworks-list" id="<?php echo 'accordionExample'.$postInfoArray['id'] ?>">
                                    <div class="card">
                                        <div class="card-header" id="<?php echo 'heading'.$postInfoArray['id'] ?>">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left topic-label" type="button" data-toggle="collapse" data-target="#<?php echo 'coll'.$postInfoArray['id'] ?>" aria-expanded="true" aria-controls="<?php echo 'coll'.$postInfoArray['id'] ?>">
                                                    <?php 
                                                        if($postInfoArray['type']==1)
                                                            $postType = 'assignment';
                                                        elseif($postInfoArray['type']==3)
                                                            $postType = 'material';
                                                        else
                                                            $postType = 'announment';
                                                        echo getUserInfo($conn, $postInfoArray['user_id'])->fetch_assoc()['fullname'].' posted a new '.$postType.': '.$postInfoArray['title'];
                                                    ?>
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="<?php echo 'coll'.$postInfoArray['id'] ?>" class="collapse" aria-labelledby="<?php echo 'heading'.$postInfoArray['id'] ?>" data-parent="#<?php echo 'accordionExample'.$postInfoArray['id'] ?>">
                                            <div class="card-body">
                                                <div class="shorten-post-content">
                                                    <?php echo $postInfoArray['details'] ?>
                                                </div>
                                                <footer class="blockquote-footer">
                                                    <small class="text-muted">
                                                        <cite title="Source Title"><?php echo date('d/m/yy',strtotime($activeClassInfo['created_date']))?></cite>
                                                        <i class="num_of_answers"><?php echo $postInfoArray['num_comments'] ?> comments</i>
                                                    </small>
                                                    <div class="post-link">
                                                        <a href="post-detail.php?ci=<?php echo $activeClassInfo['id'];?>&pi=<?php echo $postInfoArray['id'];?>">Learn more</a>
                                                    </div>
                                                </footer>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }}}}?>
                            </div>
                            <div class="tab-pane fade" id="question" role="tabpanel" aria-labelledby="question-tab">
                                <div class="row">
                                    <div class="col-md-3 hidden-xs">
                                        <div class="topic-nav">
                                            <h3>All topics</h3>
                                            <?php
                                            if($topic_list->num_rows > 0){
                                                while($topic = $topic_list->fetch_assoc()){
                                                    if($topic['topic']!=null){
                                                        $topic_info = getTopicInfo($conn, $topic['topic'])->fetch_assoc();
                            
                                            ?>
                                            <button class="btn btn-link btn-block text-left topic-label" type="button" data-toggle="collapse" data-target="#coll<?php echo $topic_info['id'];?>" aria-expanded="true" aria-controls="coll<?php echo $topic_info['id'];?>">
                                                <?php echo $topic_info['name'];?>
                                            </button>
                                            <?php }}}?>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="accordion classworks-list" id="accordionExample">
                                            <?php
                                            $topic_list = getAllTopicsOfClass($conn, $_SESSION['active_classId'], 1);
                                            if($topic_list->num_rows > 0){
                                                while($topic = $topic_list->fetch_assoc()){
                                                    if($topic['topic']!=null){
                                                        $topic_info = getTopicInfo($conn, $topic['topic'])->fetch_assoc();
                                            ?>
                                            <div class="card">
                                                <div class="card-header" id="heading<?php echo $topic_info['id'];?>">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link btn-block text-left topic-label" type="button" data-toggle="collapse" data-target="#coll<?php echo $topic_info['id'];?>" aria-expanded="true" aria-controls="coll<?php echo $topic_info['id'];?>">
                                                    <?php echo $topic_info['name'];?>
                                                    </button>
                                                </h2>
                                                </div>

                                                <div id="coll<?php echo $topic_info['id'];?>" class="collapse" aria-labelledby="heading<?php echo $topic_info['id'];?>" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <ul>
                                                        <?php 
                                                        $all_assignments_list = getAllAssignmentsOfClassssByTopic($conn,1, $_SESSION['active_classId'], $topic_info['id']);
                                                        if($all_assignments_list->num_rows > 0){
                                                            while($assignmentsList = $all_assignments_list->fetch_assoc()){ 
                                                                if(getPostInfo($conn, $assignmentsList["id"])->num_rows > 0){
                                                                    $assignmentInfoArray = getPostInfo($conn, $assignmentsList["id"])->fetch_assoc();
                                                                    if(($assignmentInfoArray['limit_time'] == null || $assignmentInfoArray['limit_time'] > $assignmentInfoArray['date_created']) 
                                                                        && checkUserVisibility($conn, $assignmentInfoArray['id'], $_SESSION['userId'])){
                                                        ?>
                                                        <li class="list-group-item todo-list-item">
                                                            <span>
                                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" d="M4 0h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H4z"/>
                                                                    <path fill-rule="evenodd" d="M4.5 10.5A.5.5 0 0 1 5 10h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
                                                                </svg>
                                                                <i>
                                                                    <a href="post-detail.php?ci=<?php echo $assignmentInfoArray['class_id'];?>&pi=<?php echo $assignmentInfoArray['id'];?>">
                                                                        <?php echo $assignmentInfoArray['title']; ?>
                                                                    </a>
                                                                </i>
                                                            </span>
                                                            <small class="limit-time">
                                                            <?php 
                                                            if($assignmentInfoArray['limit_time']!=null)
                                                                echo 'Due to '.$assignmentInfoArray['limit_time']; 
                                                            ?></small>
                                                            
                                                        </li>
                                                        <?php }}}}?>
                                                    </ul>
                                                </div>
                                                </div>
                                            </div>
                                            <?php }}}?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="response" role="tabpanel" aria-labelledby="response-tab">
                                <div class="people-info">
                                    <div class="teacher-info-list">
                                        <h3>Teacher</h3>
                                        <?php if($_SESSION['active_class_roleId'] == 2 || $_SESSION['active_class_roleId'] == 1){?>
                                        <div class="add-people-icon" data-toggle="modal" data-target="#staticBackdrop1">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                            </svg>
                                        </div>
                                        <?php } ?>
                                        <div class="clearfix"></div>
                                        <ul class="list-group list-group-flush teacher_list">
                                        <?php 
                                        if($teacher_list->num_rows > 0){
                                            while($list = $teacher_list->fetch_assoc()){ 
                                                if(getUserInfo($conn, $list["user_id"])->num_rows > 0){
                                                    $teacherInfoArray = getUserInfo($conn, $list["user_id"])->fetch_assoc();
                                                
                                        ?>
                                            <li class="list-group-item">
                                                <img class="avatar" src="img/avatar.png" alt="avatar">
                                                <?php echo $teacherInfoArray['fullname']?>
                                            </li>
                                        <?php }}} ?>
                                            <li class="list-group-item"></li>
                                        </ul>
                                    </div>
                                    <div class="student-info-list">
                                        <h3>Student</h3>
                                        <?php if($_SESSION['active_class_roleId'] == 2 || $_SESSION['active_class_roleId'] == 1){?>
                                        <div class="add-people-icon"  data-toggle="modal" data-target="#staticBackdrop1">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                            </svg>
                                        </div>
                                        <?php } ?>
                                        <div class="clearfix"></div>
                                            <?php if($_SESSION['active_class_roleId'] == 2 || $_SESSION['active_class_roleId'] == 1){?>
                                            <form method="POST">
                                                <button type="submit" class="btn btn-dark" name="remove-people-btn">Remove</button>
                                                <ul class="list-group list-group-flush teacher_list">
                                                <?php 
                                                if($student_list->num_rows > 0){
                                                    while($list = $student_list->fetch_assoc()){ 
                                                        if(getUserInfo($conn, $list["user_id"])->num_rows > 0){
                                                            $studentInfoArray = getUserInfo($conn, $list["user_id"])->fetch_assoc();
                                                        
                                                ?>
                                                    <li class="list-group-item">
                                                        <input class="to-check" name="check_list[]" type="checkbox" id=<?php echo $studentInfoArray['id']?> value=<?php echo $studentInfoArray['id']?>>
                                                        <label for=<?php echo $studentInfoArray['id']?>>
                                                            <img class="avatar" src="img/avatar.png" alt="avatar">
                                                            <?php echo $studentInfoArray['fullname']?>
                                                        </label>
                                                    </li>
                                                <?php }}} ?>
                                                    <li class="list-group-item"></li>
                                                </ul>
                                            </form>
                                            <?php } else {?>
                                            <ul class="list-group list-group-flush teacher_list">
                                            <?php 
                                            if($student_list->num_rows > 0){
                                                while($list = $student_list->fetch_assoc()){ 
                                                    if(getUserInfo($conn, $list["user_id"])->num_rows > 0){
                                                        $studentInfoArray = getUserInfo($conn, $list["user_id"])->fetch_assoc();
                                                    
                                            ?>
                                                <li class="list-group-item">
                                                    <img class="avatar" src="img/avatar.png" alt="avatar">
                                                    <?php echo $studentInfoArray['fullname']?>
                                                </li>
                                            <?php }}} ?>
                                                <li class="list-group-item"></li>
                                            </ul>
                                            <?php } ?>
                                    </div>
                                </div>
                                    
                            </div>
                            <div class="tab-pane fade" id="deadline" role="tabpanel" aria-labelledby="deadline-tab">  
                                <?php 
                                    $assignments_list = getPostsListOfClassByType($conn, 1, $activeClassInfo['id']);
                                    if($assignments_list->num_rows > 0){
                                        while($assignmentsList = $assignments_list->fetch_assoc()){ 
                                            if(getPostInfo($conn, $assignmentsList["id"])->num_rows > 0){
                                                $assignmentInfoArray = getPostInfo($conn, $assignmentsList["id"])->fetch_assoc();
                                                if(($assignmentInfoArray['limit_time'] == null || $assignmentInfoArray['limit_time'] > $assignmentInfoArray['date_created']) 
                                                && checkUserVisibility($conn, $assignmentInfoArray['id'], $_SESSION['userId'])){
                                ?>
                                <h6>
                                    <i><a href="post-detail.php?ci=<?php echo $assignmentInfoArray['class_id'];?>&pi=<?php echo $assignmentInfoArray['id'];?>"><?php echo $assignmentInfoArray['title'];?></a></i>
                                </h6>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="table-active" scope="col">Index</th>
                                                <th class="table-active" scope="col">Full Name</th>
                                                <th class="table-active" scope="col">Files upload</th>
                                                <th class="table-active" scope="col">Date turn in</th>
                                                <th class="table-active" scope="col">Score</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $stdFilesOfPost = getStdFilesOfPost($conn, $assignmentInfoArray['id']);
                                                $numTurnIn = 0;
                                                if($stdFilesOfPost->num_rows > 0){
                                                    while($fileInfo = $stdFilesOfPost->fetch_assoc()){
                                                        $numTurnIn++;
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $numTurnIn; ?></th>
                                                <td><?php echo getUserInfo($conn, $fileInfo['user_id'])->fetch_assoc()['fullname'];?></td>
                                                <td><?php echo "<a href='verify.php?pf=".$fileInfo['path']."'>".$fileInfo['path']."</a><br> ";?></td>
                                                <td><?php echo $fileInfo['date_created'];?></td>
                                                <td>
                                                    <form action="verify.php?si=<?php echo $fileInfo['user_id'];?>&pi=<?php echo $fileInfo['post_id'];?>&ci=<?php echo $fileInfo['class_id'];?>" method="Post">
                                                        <input class="score-input" id="score" name="score" type="number" min="0" max=<?php echo $assignmentInfoArray['limit_score'];?> value=
                                                        <?php 
                                                            $score = getUserScoreOfAssignment($conn, $fileInfo['user_id'], $fileInfo['post_id']);
                                                            if($score->num_rows > 0){
                                                                echo $score->fetch_assoc()['score'];
                                                            }else{
                                                                echo '/';
                                                            }
                                                        ?>>
                                                        <input type="submit" name="add-score-btn" value="Save">
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php }} ?>
                                        </tbody>
                                        <caption><?php echo 'Number of turn-in: '.$numTurnIn; ?></caption>
                                    </table>
                                </div>
                                <?php }}}}?>                   
                            </div>

                        </div> 
                    </div>
                    <div class="col-md-4 sidebar">
                        <div id="questions-widget-2" class="widget questions-widget">
                            <h3 class="widget_title">To-do list</h3>
                            <ul class="related-posts">
                                <?php 
                                    $assignments_list = getPostsListOfClassByType($conn, 1, $activeClassInfo['id']);
                                    if($assignments_list->num_rows > 0){
                                        while($assignmentsList = $assignments_list->fetch_assoc()){ 
                                            if(getPostInfo($conn, $assignmentsList["id"])->num_rows > 0){
                                                $assignmentInfoArray = getPostInfo($conn, $assignmentsList["id"])->fetch_assoc();
                                                if(($assignmentInfoArray['limit_time'] == null || $assignmentInfoArray['limit_time'] > $assignmentInfoArray['date_created']) 
                                                && checkUserVisibility($conn, $assignmentInfoArray['id'], $_SESSION['userId'])){
                                ?>
                                <li class="related-item todo-list-item">
                                    <div class="questions-div">
                                        <h3>
                                            <a href="post-detail.php?ci=<?php echo $_SESSION['active_classId'];?>&pi=<?php echo $assignmentInfoArray['id'];?>">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-journal-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                                                    <path fill-rule="evenodd" d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                                </svg>
                                                <?php echo $assignmentInfoArray['title'];?>
                                            </a>
                                        </h3>
                                    </div>
                                </li>
                                <?php }}}}?>
                            </ul>
                        </div>
                        <div id="tag_cloud-2" class="widget widget_tag_cloud">
                            <h3 class="widget_title">Tag Cloud</h3>
                            <div class="tagcloud">
                                <?php 
                                $topics_list = getAllTopicsOfClass($conn, $activeClassInfo['id']);
                                if($topics_list->num_rows > 0){
                                    while($topicsList = $topics_list->fetch_assoc()){ 
                                        if(getTopicInfo($conn, $topicsList["topic"])->num_rows > 0){
                                            $topicInfoArray = getTopicInfo($conn, $topicsList["topic"])->fetch_assoc();
                                ?>
                                <a href="#" class="tag-cloud-link tag-link-5 tag-link-position-1"><?php echo $topicInfoArray['name'];?></a>
                                <?php }}}?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require 'footer-tag.php';?>
    </div>
</body>

</html>
<script type="text/javascript" src="main.js"></script>
