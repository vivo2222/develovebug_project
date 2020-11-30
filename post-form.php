<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }
    if(!isset($_SESSION['active_classId']))
        header("Location: home.php");
	require "controllers/roleController.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php require 'head-tag.php';?>

<body>
    <div class="background-cover"></div>
    <?php require 'create-form.php';?>
    <div id="wrap" class="wrap-nicescroll">
        <?php require "nav.php"?>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 row">
                        <h1 class="col-md-6">
                        Post Assignment
                        </h1>
                        <div class="crumbs col-md-6">
                            <a href="home.php">Home</a>
                            <span class="crumbs-span">/</span>
                            <a href="classes.php">Classes</a>
                            <span class="crumbs-span">/</span>
                            <a href="class.php?classId=<?php echo $activeClassInfo['id'];?>">
                            <?php
                                echo $activeClassInfo['subject'];
                            ?>
                            </a>
                            <span class="crumbs-span">/</span>
                            <span class="current">Post Assignment</span>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="q-main-content">
            <div class="container main-content">
                <div class="row">
                    <div class="col-md-8">
                        <?php if($_SESSION['active_roleId'] == 2 || $_SESSION['active_roleId'] == 1){?>
                        <ul class="tab-title nav nav-tabs justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item active" role="presentation">
                                <a class="nav-link active" id="class-tab" data-toggle="tab" href="#class" role="tab"
                                    aria-controls="home" aria-selected="true">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-collection-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7z"/>
                                        <path fill-rule="evenodd" d="M2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z"/>
                                    </svg>
                                    <span class="hidden-xs">Assignment</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="question-tab" data-toggle="tab" href="#question" role="tab"
                                    aria-controls="profile" aria-selected="false">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                    <span class="hidden-xs">Material</span>    
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active class-tab" id="class" role="tabpanel" aria-labelledby="class-tab">
                                <div class="page-template-template-ask_question page-content">
                                    <div class="form-posts">
                                        <form-style class="form-style form-style-3 question-submit">
                                            <div class="ask_question">
                                                <form method="POST" action="" class="infocenter-q-form"
                                                    enctype="multipart/form-data">
                                                    <div class="infocenter_error_display display"></div>
                                                    <div class="form-inputs clearfix">
                                                        <p>
                                                            <label for="assignment" class="required">
                                                                Title
                                                                <span>*</span>
                                                            </label>
                                                            <input name="title" type="text" id="assignment" class="the-title" required value>
                                                            <span class="infocenter-qform-desc">Please type your assignment title here.</span>
                                                        </p>
                                                        <p>
                                                            <label for="limit-score" class="required">
                                                                Limit score
                                                            </label>
                                                            <input min="0" max="100" name="limit_score" type="number" id="limit-score" class="the-title" value>
                                                            <span class="infocenter-qform-desc">Please type limit score here.</span>
                                                        </p>
                                                        <p>
                                                            <label for="limit-time" class="required">
                                                                Due to
                                                            </label>
                                                            <input name="limit_time" type="date" id="limit-time" class="the-title" value>
                                                            <span class="infocenter-qform-desc">Please type limit score here.</span>
                                                        </p>
                                                        <p>
                                                            <label for="assignment-category" class="required">
                                                                Category
                                                                <span>*</span>
                                                            </label>
                                                            <span class="styled-select">
                                                                <select name="category" id="category" class="postform">
                                                                    <option value="">Select a Category</option>
                                                                    <?php 
                                                                        if($topic_list->num_rows > 0){
                                                                            while($topicsList = $topic_list->fetch_assoc()){ 
                                                                                if(getTopicInfo($conn, $topicsList["topic"])->num_rows > 0){
                                                                                    $topicInfoArray = getTopicInfo($conn, $topicsList["topic"])->fetch_assoc();
                                                                    ?>
                                                                    
                                                                    <option value="11" class="level-0">HTML</option>
                                                                    <option value="19" class="level-0">PHP</option>
                                                                    <option value="10" class="level-0">REACTJS</option>
                                                                    <?php }}}?>
                                                                </select>
                                                            </span>
                                                            <input name="category" type="text" id="category" class="the-title" placeholder="Or add new topic" value>

                                                            <span class="infocenter-qform-desc">Please choose correct category for the assignment.</span>
                                                        </p>
                                                        <p>
                                                            <label class="required">
                                                                Limit visibility
                                                                <span>*</span>
                                                            </label>
                                                            <span class="styled-check styled-select" data-toggle="modal" data-target="#staticBackdrop">
                                                                Select students
                                                            </span>
                                                        
                                                            <span class="infocenter-qform-desc">Select students who will be informed about this post.</span>
                                                        </p>
                                                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="staticBackdropLabel">Select students</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <ul class="list-group assignment-visibility student-list">
                                                                            <li class="list-group-item" aria-disabled="true">
                                                                                <input class="to-check" name="check_list_visibility[]" type="checkbox" id="selectAll">
                                                                                <label for="selectAll">
                                                                                    <img class="avatar" src="img/avatar.png" alt="avatar">
                                                                                    All students
                                                                                </label>
                                                                            </li>
                                                                            <?php 
                                                                            if($student_list->num_rows > 0){
                                                                                while($list = $student_list->fetch_assoc()){ 
                                                                                    if(getUserInfo($conn, $list["user_id"])->num_rows > 0){
                                                                                        $studentInfoArray = getUserInfo($conn, $list["user_id"])->fetch_assoc();
                                                                                        if($studentInfoArray['id'] != $_SESSION["userId"] && $studentInfoArray['id'] != 1){
                                                                                    
                                                                            ?>
                                                                            <li class="list-group-item">
                                                                                <input class="to-check" name="check_list_visibility[]" type="checkbox" id=<?php echo $studentInfoArray['id']?> value=<?php echo $studentInfoArray['id']?>>
                                                                                <label for=<?php echo $studentInfoArray['id']?>>
                                                                                    <img class="avatar" src="img/avatar.png" alt="avatar">
                                                                                    <?php echo $studentInfoArray['fullname']?>
                                                                                </label>
                                                                            </li>
                                                                            <?php }}}} ?>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn btn-primary">Accept</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <label>Attachment</label>
                                                        <div class="question-multiple-upload">
                                                            <div class="clearfix"></div>
                                                            <p class="form-submit add_poll">
                                                                <button type="button"
                                                                    class="button color small submit add_poll_button add_upload_button_js">
                                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="add-file bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                                    </svg>
                                                                    Add Field
                                                                </button>
                                                            </p>
                                                            
                                                            <ul class="question_poll_item question_upload_item ui-sortable">
                                                                <li class='poll_li_1'>
                                                                    <div class='poll-li'>
                                                                        <div class='fileinputs'> 
                                                                            <input type='file' class='file' name='files[]' multiple>
                                                                            <div class='fakefile'> 
                                                                                <button type='button' class='button small margin_0'>Select file</button>
                                                                                <span>
                                                                                    <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-upload' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                                                                        <path fill-rule='evenodd' d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z' />
                                                                                        <path fill-rule='evenodd' d='M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z' />
                                                                                    </svg>
                                                                                    Browse
                                                                                </span>
                                                                            </div>
                                                                            <div class='del-poll-li'>
                                                                                <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-x-square-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                                                                    <path fill-rule='evenodd' d='M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z' />
                                                                                </svg> 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            <button class="show-files-detail" type="button" onclick="FileDetails()" >Show Details</button>
                                                                    
                                                            
                                                            <p id="files-detail"></p>
                                                            <!-- <script> var next_attachment = 1;</script> -->
                                                            <div class="clearfix"></div>
                                                        </div>

                                                    </div>
                                                    <div>
                                                        <label for="assignment-details" class="required">
                                                            Details
                                                        </label>
                                                        <div class="the-details the-textarea">
                                                            <div id="assignment-details-wrap"
                                                                class="core-ui editor-wrap html-active">
                                                                <div id="assignment-details-editor-container"
                                                                    class="editor-container">
                                                                    <textarea name="details" id="assignment-details" cols="40"
                                                                        rows="10" class="editor-area"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>
                                                            <span class="infocenter-qform-desc">
                                                                Type your assignment description here. <br>
                                                            </span>
                                                        </p>
                                                    </div>
                                                    
                                                    <p class="form-submit">
                                                        <input type="hidden" name="form_type" value="add_question">
                                                        <input type="hidden" name="post_type" value="add_question">
                                                        <input type="submit" name="post-form-btn" value="Publish Your Post" class="button color small submit add_qu publish-question">
                                                    </p>
                                                </form>
                                            </div>
                                        </form-style>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="question" role="tabpanel" aria-labelledby="question-tab">
                                <div class="page-template-template-ask_question page-content">
                                    <div class="form-posts">
                                        <form-style class="form-style form-style-3 question-submit">
                                            <div class="ask_question">
                                                <form method="POST" action="" class="infocenter-q-form"
                                                    enctype="multipart/form-data">
                                                    <div class="infocenter_error_display display"></div>
                                                    <div class="form-inputs clearfix">
                                                        <p>
                                                            <label for="assignment" class="required">
                                                                Title
                                                                <span>*</span>
                                                            </label>
                                                            <input name="title" type="text" id="assignment" class="the-title" required value>
                                                            <span class="infocenter-qform-desc">Please type your post title here.</span>
                                                        </p>
                                                        <p>
                                                            <label class="required">
                                                                Limit visibility
                                                                <span>*</span>
                                                            </label>
                                                            <span class="styled-check styled-select" data-toggle="modal" data-target="#staticBackdrop2">
                                                                Select students
                                                            </span>
                                                        
                                                            <span class="infocenter-qform-desc">Select students who will be informed about this post.</span>
                                                        </p>
                                                        <div class="modal fade" id="staticBackdrop2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop2Label" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="staticBackdrop2Label">Select students</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <ul class="list-group assignment-visibility student-list">
                                                                            <li class="list-group-item" aria-disabled="true">
                                                                                <input class="to-check" name="check_list_visibility[]" type="checkbox" id="selectAll">
                                                                                <label for="selectAll">
                                                                                    <img class="avatar" src="img/avatar.png" alt="avatar">
                                                                                    All people
                                                                                </label>
                                                                            </li>
                                                                            <?php 
                                                                            if($all_people->num_rows > 0){
                                                                                while($list = $all_people->fetch_assoc()){ 
                                                                                    if(getUserInfo($conn, $list["user_id"])->num_rows > 0){
                                                                                        $peopleInfoArray = getUserInfo($conn, $list["user_id"])->fetch_assoc();
                                                                                        if($peopleInfoArray['id'] != $_SESSION["userId"] && $peopleInfoArray['id'] != 1){
                                                                                    
                                                                            ?>
                                                                            <li class="list-group-item">
                                                                                <input class="to-check" name="check_list_visibility[]" type="checkbox" id=<?php echo $peopleInfoArray['id']?> value=<?php echo $peopleInfoArray['id']?>>
                                                                                <label for=<?php echo $peopleInfoArray['id']?>>
                                                                                    <img class="avatar" src="img/avatar.png" alt="avatar">
                                                                                    <?php echo $peopleInfoArray['fullname']?>
                                                                                </label>
                                                                            </li>
                                                                            <?php }}}} ?>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn btn-primary">Accept</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <label>Attachment</label>
                                                        <div class="question-multiple-upload">
                                                            <div class="clearfix"></div>
                                                            <p class="form-submit add_poll">
                                                                <button type="button"
                                                                    class="button color small submit add_poll_button add_upload_button_js">
                                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="add-file bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                                    </svg>
                                                                    Add Field
                                                                </button>
                                                            </p>
                                                            
                                                            <ul class="question_poll_item question_upload_item ui-sortable">
                                                                <li class='poll_li_1'>
                                                                    <div class='poll-li'>
                                                                        <div class='fileinputs'> 
                                                                            <input type='file' class='file' name='files[]' multiple>
                                                                            <div class='fakefile'> 
                                                                                <button type='button' class='button small margin_0'>Select file</button>
                                                                                <span>
                                                                                    <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-upload' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                                                                        <path fill-rule='evenodd' d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z' />
                                                                                        <path fill-rule='evenodd' d='M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z' />
                                                                                    </svg>
                                                                                    Browse
                                                                                </span>
                                                                            </div>
                                                                            <div class='del-poll-li'>
                                                                                <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-x-square-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                                                                    <path fill-rule='evenodd' d='M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z' />
                                                                                </svg> 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            <button class="show-files-detail" type="button" onclick="FileDetails()" >Show Details</button>
                                                                    
                                                            
                                                            <p id="files-detail"></p>
                                                            <!-- <script> var next_attachment = 1;</script> -->
                                                            <div class="clearfix"></div>
                                                        </div>

                                                    </div>
                                                    <div>
                                                        <label for="assignment-details" class="required">
                                                            Details
                                                        </label>
                                                        <div class="the-details the-textarea">
                                                            <div id="assignment-details-wrap"
                                                                class="core-ui editor-wrap html-active">
                                                                <div id="assignment-details-editor-container"
                                                                    class="editor-container">
                                                                    <textarea name="details" id="assignment-details" cols="40"
                                                                        rows="10" class="editor-area"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>
                                                            <span class="infocenter-qform-desc">
                                                                Type your post description here. <br>
                                                            </span>
                                                        </p>
                                                    </div>
                                                    
                                                    <p class="form-submit">
                                                        <input type="hidden" name="form_type" value="add_question">
                                                        <input type="hidden" name="post_type" value="add_question">
                                                        <input type="submit" name="post-form-btn" value="Publish Your Post" class="button color small submit add_qu publish-question">
                                                    </p>
                                                </form>
                                            </div>
                                        </form-style>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        
                        <?php } else {?>
                        <div class="page-template-template-ask_question page-content">
                            <div class="form-posts">
                                <form-style class="form-style form-style-3 question-submit">
                                    <div class="ask_question">
                                        <form method="POST" action="" class="infocenter-q-form"
                                            enctype="multipart/form-data">
                                            <div class="infocenter_error_display display"></div>
                                            <div class="form-inputs clearfix">
                                                <p>
                                                    <label for="assignment" class="required">
                                                        Title
                                                        <span>*</span>
                                                    </label>
                                                    <input name="title" type="text" id="assignment" class="the-title" required value>
                                                    <span class="infocenter-qform-desc">Please type your post title here.</span>
                                                </p>
                                                <p>
                                                    <label class="required">
                                                        Limit visibility
                                                        <span>*</span>
                                                    </label>
                                                    <span class="styled-check styled-select" data-toggle="modal" data-target="#staticBackdrop">
                                                        Select students
                                                    </span>
                                                
                                                    <span class="infocenter-qform-desc">Select students who will be informed about this post.</span>
                                                </p>
                                                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Select students</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <ul class="list-group assignment-visibility student-list">
                                                                    <li class="list-group-item" aria-disabled="true">
                                                                        <input class="to-check" name="check_list_visibility[]" type="checkbox" id="selectAll">
                                                                        <label for="selectAll">
                                                                            <img class="avatar" src="img/avatar.png" alt="avatar">
                                                                            All people
                                                                        </label>
                                                                    </li>
                                                                    <?php 
                                                                    if($all_people->num_rows > 0){
                                                                        while($list = $all_people->fetch_assoc()){ 
                                                                            if(getUserInfo($conn, $list["user_id"])->num_rows > 0){
                                                                                $peopleInfoArray = getUserInfo($conn, $list["user_id"])->fetch_assoc();
                                                                                if($peopleInfoArray['id'] != $_SESSION["userId"] && $peopleInfoArray['id'] != 1){
                                                                            
                                                                    ?>
                                                                    <li class="list-group-item">
                                                                        <input class="to-check" name="check_list_visibility[]" type="checkbox" id=<?php echo $peopleInfoArray['id']?> value=<?php echo $peopleInfoArray['id']?>>
                                                                        <label for=<?php echo $peopleInfoArray['id']?>>
                                                                            <img class="avatar" src="img/avatar.png" alt="avatar">
                                                                            <?php echo $peopleInfoArray['fullname']?>
                                                                        </label>
                                                                    </li>
                                                                    <?php }}}} ?>
                                                                </ul>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Accept</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label>Attachment</label>
                                                <div class="question-multiple-upload">
                                                    <div class="clearfix"></div>
                                                    <p class="form-submit add_poll">
                                                        <button type="button"
                                                            class="button color small submit add_poll_button add_upload_button_js">
                                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="add-file bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                            </svg>
                                                            Add Field
                                                        </button>
                                                    </p>
                                                    
                                                    <ul class="question_poll_item question_upload_item ui-sortable">
                                                        <li class='poll_li_1'>
                                                            <div class='poll-li'>
                                                                <div class='fileinputs'> 
                                                                    <input type='file' class='file' name='files[]' multiple>
                                                                    <div class='fakefile'> 
                                                                        <button type='button' class='button small margin_0'>Select file</button>
                                                                        <span>
                                                                            <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-upload' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                                                                <path fill-rule='evenodd' d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z' />
                                                                                <path fill-rule='evenodd' d='M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z' />
                                                                            </svg>
                                                                            Browse
                                                                        </span>
                                                                    </div>
                                                                    <div class='del-poll-li'>
                                                                        <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-x-square-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                                                            <path fill-rule='evenodd' d='M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z' />
                                                                        </svg> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <button class="show-files-detail" type="button" onclick="FileDetails()" >Show Details</button>
                                                            
                                                    
                                                    <p id="files-detail"></p>
                                                    <p>
                                                        <span class="infocenter-qform-desc">Select file to share for this post.</span>
                                                    </p>
                                                    <div class="clearfix"></div>
                                                </div>

                                            </div>
                                            <div>
                                                <label for="assignment-details" class="required">
                                                    Details
                                                </label>
                                                <div class="the-details the-textarea">
                                                    <div id="assignment-details-wrap"
                                                        class="core-ui editor-wrap html-active">
                                                        <div id="assignment-details-editor-container"
                                                            class="editor-container">
                                                            <textarea name="details" id="assignment-details" cols="40"
                                                                rows="10" class="editor-area"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p>
                                                    <span class="infocenter-qform-desc">
                                                        Type your assignment description here. <br>
                                                    </span>
                                                </p>
                                            </div>
                                            
                                            <p class="form-submit">
                                                <input type="hidden" name="form_type" value="add_question">
                                                <input type="hidden" name="post_type" value="add_question">
                                                <input type="submit" name="post-form-btn" value="Publish Your Post" class="button color small submit add_qu publish-question">
                                            </p>
                                        </form>
                                    </div>
                                </form-style>
                            </div>
                        </div>
                        <?php } if (!empty($errors)) {?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $errors ?>
                            </div>
                        <?php  }?>
                    </div>
                    <div class="col-md-4 sidebar">
                        <div id="questions-widget-2" class="widget questions-widget">
                            <h3 class="widget_title">To-do list</h3>
                            <ul class="related-posts">
                                <li class="related-item">
                                    <div class="questions-div">
                                        <h3>
                                            <a href="#">
                                                <i class="far fa-file-alt"></i>
                                                Bài tập lớn
                                            </a>
                                        </h3>
                                    </div>
                                </li>
                                <li class="related-item">
                                    <div class="questions-div">
                                        <h3>
                                            <a href="#">
                                                <i class="far fa-file-alt"></i>
                                                Bài tập lớn
                                            </a>
                                        </h3>
                                    </div>
                                </li>
                                <li class="related-item">
                                    <div class="questions-div">
                                        <h3>
                                            <a href="#">
                                                <i class="far fa-file-alt"></i>
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
    </div>
</body>

</html>
<script type="text/javascript" src="main.js"></script>