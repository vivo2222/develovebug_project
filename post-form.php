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
                <form action="#" class="join" method="POST">
                    <div class="field">
                    <p>Ask your teacher for class code</p>
                    <input type="text" name="classCode" placeholder="Class Code" required>
                    </div>
                    <div class="field btn">
                    <div class="btn-layer"></div>
                    <input type="submit" name="join-class-btn" value="Join">
                    </div>
                </form>
                <form action="#" method="post" class="create">
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
                    <input type="submit" name="create-class-btn" value="Create">
                    </div>
                </form>
                </div>
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
                        <div class="page-template-template-ask_question page-content">
                            <div class="form-posts">
                                <form-style class="form-style form-style-3 question-submit">
                                    <div class="ask_question">
                                        <form method="POST" action="" class="infocenter-q-form"
                                            enctype="multipart/form-data">
                                            <div class="infocenter_error_display display"></div>
                                            <div class="form-inputs clearfix">
                                                <p>
                                                    <label for="assignment-title" class="required">
                                                        Title
                                                        <span>*</span>
                                                    </label>
                                                    <input name="title" type="text" id="assignment-title" class="the-title" value>
                                                    <span class="infocenter-qform-desc">Please type your assignment title here.</span>
                                                </p>
                                                <p>
                                                    <label for="limit-score-title" class="required">
                                                        Limit score
                                                    </label>
                                                    <input min="0" max="100" name="title" type="number" id="limit-score-title" class="the-title" value>
                                                    <span class="infocenter-qform-desc">Please type limit score here.</span>
                                                </p>
                                                <p>
                                                    <label for="assignment-category" class="required">
                                                        Category
                                                        <span>*</span>
                                                    </label>
                                                    <span class="styled-select">
                                                        <select name="category" id="assignment-category" class="postform">
                                                            <option value="-1">Select a Category</option>
                                                            <option value="12" class="level-0">CSS</option>
                                                            <option value="11" class="level-0">HTML</option>
                                                            <option value="19" class="level-0">PHP</option>
                                                            <option value="10" class="level-0">REACTJS</option>
                                                        </select>

                                                    </span>
                                                    <span class="infocenter-qform-desc">Please choose correct category for the assignment.</span>
                                                </p>
                                                <p>
                                                    <label for="assignment-category" class="required">
                                                        Limit visibility
                                                        <span>*</span>
                                                    </label>
                                                    <span class="styled-select">
                                                        <select name="visibility" id="assignment-visibility" class="postform">
                                                            <option value="-1">Select a visibility</option>
                                                            <option value="12" class="level-0">All people</option>
                                                            <option value="11" class="level-0">HTML</option>
                                                            <option value="19" class="level-0">PHP</option>
                                                            <option value="10" class="level-0">REACTJS</option>
                                                        </select>

                                                    </span>
                                                    <span class="infocenter-qform-desc">Please choose correct category for the assignment.</span>
                                                </p>
                                                <label>Attachment</label>
                                                <div class="question-multiple-upload">
                                                    <div class="clearfix"></div>
                                                    <p class="form-submit add_poll">
                                                        <button type="button"
                                                            class="button color small submit add_poll_button add_upload_button_js">
                                                            <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                                class="add-file bi bi-plus" fill="currentColor"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                            </svg>
                                                            Add Field
                                                        </button>
                                                    </p>
                                                    <ul class="question_poll_item question_upload_item ui-sortable">
                                                        <li class="poll_li_1">
                                                            <div class="poll-li">
                                                                <div class="fileinputs">
                                                                    <input type="file" class="file" name="attachment_m[1][file_url]" id="attachment_m[1][file_url]">
                                                                    <div class="fakefile">
                                                                        <button type="button"
                                                                            class="button small margin_0">Select
                                                                            file</button>
                                                                        <span>
                                                                            <svg width="1em" height="1em"
                                                                                viewBox="0 0 16 16" class="bi bi-upload"
                                                                                fill="currentColor"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                                                <path fill-rule="evenodd"
                                                                                    d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                                                                            </svg>
                                                                            Browse
                                                                        </span>
                                                                    </div>
                                                                    <div class="del-poll-li">
                                                                        <svg width="1em" height="1em"
                                                                            viewBox="0 0 16 16"
                                                                            class="bi bi-x-square-fill"
                                                                            fill="currentColor"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd"
                                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                                                        </svg>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <!-- <script> var next_attachment = 1;</script> -->
                                                    <div class="clearfix"></div>
                                                </div>

                                            </div>
                                            <div>
                                                <label for="assignment-details" class="required">
                                                    Details
                                                    <span>*</span>
                                                </label>
                                                <div class="the-details the-textarea">
                                                    <div id="assignment-details-wrap"
                                                        class="core-ui editor-wrap html-active">
                                                        <div id="assignment-details-editor-container"
                                                            class="editor-container">
                                                            <textarea name="comment" id="assignment-details" cols="40"
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
                                                <input type="submit" name="post-form-btn" value="Publish Your Question" class="button color small submit add_qu publish-question">
                                            </p>
                                        </form>
                                    </div>
                                </form-style>
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