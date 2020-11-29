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
    <?php require 'create-form.php';?>
    <div id="wrap" class="wrap-nicescroll">
        <?php require "nav.php"?>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 row">
                        <h1 class="col-md-6">Classes</h1>
                        <div class="crumbs col-md-6">
                            <a href="home.php">Home</a>
                            <span class="crumbs-span">/</span>
                            <span class="current">Classes</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="q-main-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                    <?php 
                    if($classes_list->num_rows > 0){
                        while($list = $classes_list->fetch_assoc()){ 
                            if(getClassInfo($conn, $list["class_id"])->num_rows > 0){
                                $classInfoArray = getClassInfo($conn, $list["class_id"])->fetch_assoc();
                            
                    ?>
                        <div class="card post class-box">
                            <div class="card-header">
                                <div class="title-box">
                                    <div class="title">
                                        <a href="class.php?classId=<?php echo $classInfoArray['id']?>">
                                            <h5><?php echo $classInfoArray['subject']?></h5>
                                        </a>
                                    </div>
                                    <div class="overal-post-info-box">
                                        <span class="clock">
                                            <small>
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-layers-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M7.765 1.559a.5.5 0 0 1 .47 0l7.5 4a.5.5 0 0 1 0 .882l-7.5 4a.5.5 0 0 1-.47 0l-7.5-4a.5.5 0 0 1 0-.882l7.5-4z"/>
                                                    <path fill-rule="evenodd" d="M2.125 8.567l-1.86.992a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882l-1.86-.992-5.17 2.756a1.5 1.5 0 0 1-1.41 0l-5.17-2.756z"/>
                                                </svg>
                                                <?php echo $classInfoArray['semester']?>
                                            </small>
                                        </span>
                                        <span class="view">
                                            <small>
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                    <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                </svg>
                                                <?php echo getTeacherInfo($conn, $classInfoArray['id'])['fullname']?>
                                            </small>
                                        </span>
                                    </div>
                                </div>
                                <div class="user-info-box">
                                    <img src=<?php echo getTeacherInfo($conn, $classInfoArray['id'])['avatar']?> alt="avatar" class="avatar">
                                </div>
                                
                                
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <ul class="assignments-list">
                                        <li><a href="#">assignments</a></li>
                                        <li><a href="#">assignments</a></li>
                                        <li><a href="#">assignments</a></li>
                                        <li><a href="#">assignments</a></li>
                                    </ul>
                                    <footer class="blockquote-footer">
                                        <cite title="Source Title">    
                                            <small><i>Since 22/02/2001</i></small>
                                        </cite>
                                        <div class="hagtag-list open-class-btn open-icon">
                                            <span>
                                                <a href="class.php?classId=<?php echo $classInfoArray['id']?>">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-return-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
                                                    </svg>
                                                </a>
                                            </span>
                                        </div>
                                    </footer>
                                </blockquote>
                            </div>
                        </div>   
                    <?php }} }?> 
                    </div>
                    <div class="col-md-4 sidebar">
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
