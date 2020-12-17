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
                            <a href="class.php?ci=<?php echo $activeClassInfo['id'];?>">
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
                        <?php 
                        if(isset($_GET['pi'])){
                            $post_info = getPostInfo($conn, $_GET['pi'])->fetch_assoc();
                        ?>
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
                                                    <input name="title" type="text" id="assignment" class="the-title" required value="<?php echo $post_info['title'];?>">
                                                    <span class="infocenter-qform-desc">Please type your assignment title here.</span>
                                                </p>
                                                <p>
                                                    <label for="limit-score" class="required">
                                                        Limit score
                                                    </label>
                                                    <input min="0" max="100" name="limit_score" type="number" id="limit-score" class="the-title" value="<?php echo $post_info['limit_score'];?>">
                                                    <span class="infocenter-qform-desc">Please type limit score here.</span>
                                                </p>
                                                <p>
                                                    <label for="limit-time" class="required">
                                                        Due to
                                                    </label>
                                                    <input name="limit_time" type="datetime-local" id="limit-time" class="the-title" value="<?php echo strtotime($post_info['limit_time']);?>">
                                                    <span class="infocenter-qform-desc">Please type limit score here.</span>
                                                </p>
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
                                                    <p>
                                                    <?php
                                                    if(getPostLinkById($conn, $_GET['pi']) != null){
                                                        $links = getPostLinkById($conn, $_GET['pi']);
                                                        while($link = $links->fetch_assoc()){
                                                            echo $link['path']."<br> ";
                                                        }
                                                    }
                                                    ?>
                                                    </p>
                                                    
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
                                                                rows="10" class="editor-area"><?php echo $post_info['details'];?></textarea>
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
                                                <input type="submit" name="edit-post-info-btn" value="Change your post" class="button color small submit add_qu publish-question">
                                            </p>
                                        </form>
                                    </div>
                                </form-style>
                            </div>
                        </div>
                        <?php } else if($_SESSION['active_class_roleId'] == 2 || $_SESSION['active_class_roleId'] == 1){?>
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
                                                    <input name="limit_time" type="datetime-local" id="limit-time" class="the-title" value>
                                                    <span class="infocenter-qform-desc">Please type limit score here.</span>
                                                </p>
                                                <p>
                                                    <label for="category" class="required">
                                                        Category
                                                    </label>
                                                    <span class="styled-select">
                                                        <select name="category" id="category" class="postform">
                                                            <option >Select a Category</option>
                                                            <?php 
                                                            
                                                            if($topic_list->num_rows > 0){
                                                                while($topicsList = $topic_list->fetch_assoc()){ 
                                                                    if(getTopicInfo($conn, $topicsList["topic"])->num_rows > 0){
                                                                        $topicInfoArray = getTopicInfo($conn, $topicsList["topic"])->fetch_assoc();
                                                            ?>
                                                            <option value="<?php echo $topicInfoArray["name"]?>" class="level-0"><?php echo $topicInfoArray["name"]?></option>
                                                            <?php }}} ?>
                                                        </select>
                                                    </span>
                                                    <input type="text" id="add-new-category" class="the-title" placeholder="Add new topic" value>
                                                    <p class="form-submit add_category">
                                                        <button type="button" class="button color small submit add_poll_button add_category_btn">
                                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="add-file bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                            </svg>
                                                            Add Category
                                                        </button>
                                                        <span class="infocenter-qform-desc">Please choose correct category for the assignment.</span>
                                                    </p>
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
                                                                        <input class="to-check" type="checkbox" id="selectAllAss">
                                                                        <label for="selectAllAss">
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
                                                <input type="submit" name="assignment-form-btn" value="Publish Your Post" class="button color small submit add_qu publish-question">
                                            </p>
                                        </form>
                                    </div>
                                </form-style>
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
                                                    <label class="required">
                                                        Limit visibility
                                                        <span>*</span>
                                                    </label>
                                                    <span class="styled-check styled-select" data-toggle="modal" data-target="#staticBackdrop">
                                                        Select people can see your post
                                                    </span>
                                                
                                                    <span class="infocenter-qform-desc">Select people who will be informed about this post.</span>
                                                </p>
                                                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Select people</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <ul class="list-group announ-visibility student-list">
                                                                    <li class="list-group-item" aria-disabled="true">
                                                                        <input class="to-check" type="checkbox" id="selectAllAnn">
                                                                        <label for="selectAllAnn">
                                                                            <img class="avatar" src="img/avatar.png" alt="avatar">
                                                                            All people
                                                                        </label>
                                                                    </li>
                                                                    <?php 
                                                                    if($all_people_announ->num_rows > 0){
                                                                        while($list = $all_people_announ->fetch_assoc()){ 
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
                                                <input type="submit" name="assignment-form-btn" value="Publish Your Post" class="button color small submit add_qu publish-question">
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
    </div>
</body>

</html>
<script type="text/javascript" src="main.js"></script>