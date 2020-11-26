<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }
    require "controllers/roleController.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php require 'head-tag.php';?>

<body>
    <div class="background-cover"></div>
    <div class="hidden">
        <div class="wrapper form-div col-md-4 offset-md-4">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="close-icon bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>
            <div class="title-text">
                <div class="title join">Join Class</div>
                <div class="title create">Create Class</div>
                
            </div>
            <div class="form-container">
                <div class="slide-controls">
                <input type="radio" name="slide" id="join" checked>
                <input type="radio" name="slide" id="create">
                <label for="join" class="slide join">Join</label>
                <label for="create" class="slide create">Create</label>
                <div class="slider-tab"></div>
                </div>
                <div class="form-inner">
                <form action="" class="join" method="POST">
                    <div class="field">
                    <p>Ask your teacher for class code</p>
                    <input type="text" name="classCode" placeholder="Class Code" required>
                    </div>
                    <div class="field btn">
                    <div class="btn-layer"></div>
                    <input type="submit" name="join-class-btn" value="Join">
                    </div>
                </form>
                <form action="" method="post" class="create">
                    <div class="field">
                    <input type="text" name="subject" placeholder="Subject" required>
                    </div>
                    <div class="field">
                    <input type="text" name="semester" placeholder="Semester" required>
                    </div>
                    <div class="field">
                    <input type="text" name="room" placeholder="Room" required>
                    </div>
                    <div class="field btn">
                    <div class="btn-layer"></div>
                    <input type="submit" name="create-class-btn" value="create">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
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
                        <p><label for="subject">Subject</label></p>
                        <p><input type="text" name="subject" placeholder="Subject" value="<?php echo $activeClassInfo['subject']?>" required></p>
                    </div>
                    <div class="field">
                        <p><label for="semester">Semester</label></p>
                        <p><input type="text" name="semester" placeholder="Semester" value="<?php echo $activeClassInfo['semester']?>" required></p>
                    </div>
                    <div class="field">
                        <p><label for="room">Room</label></p>
                        <p><input type="text" name="room" placeholder="Room" value="<?php echo $activeClassInfo['room']?>" required></p>
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
                        <span class="class-alter-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                            </svg>
                            <ul class="list-group">
                                <li class="list-group-item" data-toggle="modal" data-target="#staticBackdrop">Edit class</li>
                                <li class="list-group-item" data-toggle="modal" data-target="#staticBackdrop2">Remove class</li>
                            </ul>
                        </span>
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
                            <?php if($_SESSION['active_roleId'] == 2){?>
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
                                <div class="stream-list">
                                    <div class="stream-box">
                                        <div class="post-box">
                                            <div class="card post-box-card">
                                                <div class="card-header post-box-header">
                                                    <img src="img/avatar.png" alt="avatar" class="avatar">
                                                    <div class="post-detail">
                                                        <footer class="blockquote-footer">
                                                            <small class="text-muted">
                                                                <cite title="Source Title">votuongvi2222002@gmail.com</cite>
                                                                <p>20/02/2019</p>
                                                            </small>
                                                        </footer>
                                                    </div>
                                                    
                                                    <div class="post-alter-icon">
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                                        </svg>
                                                        <ul class="list-group">
                                                            <li class="list-group-item" data-toggle="modal" data-target="#staticBackdrop1">Edit post</li>
                                                            <li class="list-group-item">Remove post</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title">Writing week 2</h5>
                                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                    <a href="#" class="btn btn-primary">Learn more</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-box comment-box-list">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item list-comment">
                                                    <div class="card-header post-box-header comment-list-item-header">
                                                        <img src="img/avatar.png" alt="avatar" class="avatar">
                                                        <div class="post-detail">
                                                            <footer class="blockquote-footer">
                                                                <small class="text-muted">
                                                                    <cite title="Source Title">votuongvi2222002@gmail.com</cite>
                                                                    <p>20/02/2019</p>
                                                                </small>
                                                                <div class="list-comment-content-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat, blanditiis ut, perspiciatis nulla earum tempore dolor illo beatae tempora dolore dolorem assumenda dicta vel dolorum architecto voluptate id eveniet maxime.</div>
                                                            </footer>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="comment-box comment-box-active">
                                            <img src="img/avatar.png" alt="avatar" class="avatar hidden-xs">
                                            <textarea class="comment-input col-9" name="comment-content" placeholder="Comment here..." cols="1" rows="1"></textarea>
                                            <button name="post-comment-btn" class="post-comment-btn col-1">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>   
                            </div>
                            <div class="tab-pane fade" id="question" role="tabpanel" aria-labelledby="question-tab">
                                <div class="row">
                                    <div class="col-md-3 hidden-xs">
                                        <div class="topic-nav">
                                            <h3>All topics</h3>
                                            <button class="btn btn-link btn-block text-left topic-label" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Week 1
                                            </button>
                                            <button class="btn btn-link btn-block text-left topic-label" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                Week 2
                                            </button>
                                            <button class="btn btn-link btn-block text-left topic-label" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                Week 3
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="accordion classworks-list" id="accordionExample">
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link btn-block text-left topic-label" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Week 1
                                                    </button>
                                                </h2>
                                                </div>

                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <ul>
                                                        <li>hfdbj,nk</li>
                                                        <li>djhgbj</li>
                                                        <li>ghhfgjk</li>
                                                    </ul>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link btn-block text-left topic-label collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Week 2
                                                    </button>
                                                </h2>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingThree">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link btn-block text-left topic-label collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Week 3
                                                    </button>
                                                </h2>
                                                </div>
                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="response" role="tabpanel" aria-labelledby="response-tab">
                                <div class="people-info">
                                    <div class="teacher-info-list">
                                        <h3>Teacher</h3>
                                        <div class="add-people-icon" data-toggle="modal" data-target="#staticBackdrop1">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                            </svg>
                                        </div>
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
                                        <div class="add-people-icon"  data-toggle="modal" data-target="#staticBackdrop1">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                            </svg>
                                        </div>
                                        <div class="clearfix"></div>
                                            <?php if($_SESSION['active_roleId'] == 2){?>
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
                                                        <input name="check_list[]" type="checkbox" id=<?php echo $studentInfoArray['id']?> value=<?php echo $studentInfoArray['id']?>>
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
                                        
                            </div>

                        </div> 
                    </div>
                    <div class="col-md-4 sidebar">
                        <div id="questions-widget-2" class="widget questions-widget">
                            <h3 class="widget_title">To-do list</h3>
                            <ul class="related-posts">
                                <li class="related-item">
                                    <div class="questions-div">
                                        <h3>
                                            <a href="#">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-journal-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                                                    <path fill-rule="evenodd" d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                                </svg>
                                                Bài tập lớn
                                            </a>
                                        </h3>
                                    </div>
                                </li>
                                <li class="related-item">
                                    <div class="questions-div">
                                        <h3>
                                            <a href="#">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-journal-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                                                    <path fill-rule="evenodd" d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                                </svg>
                                                Bài tập lớn
                                            </a>
                                        </h3>
                                    </div>
                                </li>
                                <li class="related-item">
                                    <div class="questions-div">
                                        <h3>
                                            <a href="#">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-journal-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                                                    <path fill-rule="evenodd" d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                                </svg>
                                                Bài tập lớn
                                            </a>
                                        </h3>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div id="tag_cloud-2" class="widget widget_tag_cloud">
                            <h3 class="widget_title">Tag Cloud</h3>
                            <div class="tagcloud">
                                <a href="#" class="tag-cloud-link tag-link-5 tag-link-position-1">html</a>
                                <a href="#" class="tag-cloud-link tag-link-5 tag-link-position-1">css</a>
                                <a href="#" class="tag-cloud-link tag-link-5 tag-link-position-1">php</a>
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
