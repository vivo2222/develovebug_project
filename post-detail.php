<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }
    require "controllers/roleController.php";
    if(!isset($_SESSION['active_post_role'],$_SESSION['active_postId'])){
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
                        <p><label for="subject">Subject</label></p>
                        <p><input type="text" name="subject" placeholder="Subject" value="<?php echo $activeClassInfo['subject']?>" ></p>
                    </div>
                    <div class="field">
                        <p><label for="semester">Semester</label></p>
                        <p><input type="text" name="semester" placeholder="Semester" value="<?php echo $activeClassInfo['semester']?>" ></p>
                    </div>
                    <div class="field">
                        <p><label for="room">Room</label></p>
                        <p><input type="text" name="room" placeholder="Room" value="<?php echo $activeClassInfo['room']?>" ></p>
                    </div>
                    <div class="field">
                        <p><label for="room">Code</label></p>
                        <p><input type="text" name="room" placeholder="Room" readonly=readonly value="<?php echo $activeClassInfo['code']?>"></p>
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
                        if($activePostInfo['title'] != null)
                            echo $activePostInfo['title'];
                        else
                            echo 'Post details';
                        ?> 
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
                            <span class="current">
                                <?php 
                                if($activePostInfo['title'] != null)
                                    echo $activePostInfo['title'];
                                else
                                    echo 'Post details';
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
                        <div class="stream-list">
                            <div class="stream-box">
                                <div class="post-box">
                                    <div class="card post-box-card">
                                        <div class="card-header post-box-header row">
                                            <div class="card-header-left col-md-6">
                                                <img src="img/avatar.png" alt="avatar" class="avatar">
                                                <div class="post-detail">
                                                    <footer class="blockquote-footer">
                                                        <small class="text-muted">
                                                            <cite title="Source Title"><?php echo getUserInfo($conn,$activePostInfo['user_id'])->fetch_assoc()['email'];?></cite>
                                                            <p><?php echo date('d/m/yy',strtotime($activePostInfo['date_created']));?></p>
                                                        </small>
                                                        <?php if($activePostInfo['limit_time'] != null){?>
                                                        <p>
                                                            Due to <?php echo $activePostInfo['limit_time']; ?>
                                                        </p>
                                                        <?php } ?>
                                                        <?php if($activePostInfo['limit_score'] != null){?>
                                                        <span>
                                                            <?php 
                                                                $score = getUserScoreOfAssignment($conn, $_SESSION['userId'], $activePostInfo['id']);
                                                                if($score->num_rows > 0){
                                                                    echo $score->fetch_assoc()['score']."/".$activePostInfo['limit_score']." points";
                                                                }else{
                                                                    echo '/'.$activePostInfo['limit_score']." points";
                                                                }
                                                            ?>
                                                        </span>
                                                        <?php } ?>
                                                    </footer>
                                                </div>
                                            </div>
                                            <div class="card-header-right col-md-6">
                                                <?php if($_SESSION['active_post_role'] == 1){ ?>
                                                    
                                                <div class="post-alter-icon">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                                    </svg>
                                                    <ul class="list-group">
                                                        <li class="list-group-item" data-toggle="modal" data-target="#staticBackdrop1">
                                                            <form action="" method="post"><button type="submit" name="edit-post-btn">Edit post</button></form>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <form action="" method="post"><button type="submit" name="remove-post-btn">Remove post</button></form>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <?php }?>
                                                <div class="overal-post-info-box">
                                                    <span class="reply">
                                                        <small>
                                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-square-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h2.5a2 2 0 0 1 1.6.8L8 14.333 9.9 11.8a2 2 0 0 1 1.6-.8H14a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                                <path fill-rule="evenodd" d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                                            </svg>
                                                            <?php echo $activePostInfo['num_comments'] ;?> REPLIES
                                                        </small>
                                                    </span>
                                                </div>
                                            </div>                                
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $activePostInfo['title'] ;?></h5>
                                            <p class="card-text"><?php echo $activePostInfo['details'] ;?></p>
                                            <p class="card-text">
                                            <?php
                                            if(getPostLinkById($conn, $activePostInfo['id']) != null){
                                                $links = getPostLinkById($conn, $activePostInfo['id']);
                                                while($link = $links->fetch_assoc()){
                                                    echo "<a href='verify.php?pf=".$link['path']."'>".$link['path']."</a><br> ";
                                                }
                                            }
                                            ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-box comment-box-list">
                                    <ul class="list-group list-group-flush">
                                        <?php 
                                        $comments_list = getAllCommentsOfPost($conn, $activePostInfo['id']);
                                        if($comments_list->num_rows > 0){
                                            while($comment = $comments_list->fetch_assoc()){ 
                                                $commentInfoArray = $comment;
                                                if($commentInfoArray['public']==1){
                                        ?>
                                        <li class="list-group-item list-comment">
                                            <div class="card-header post-box-header comment-list-item-header">
                                                <img src="img/avatar.png" alt="avatar" class="avatar">
                                                <div class="post-detail">
                                                    <footer class="blockquote-footer">
                                                        <small class="text-muted">
                                                            <cite title="Source Title"><?php echo getUserInfo($conn,$commentInfoArray['user_id'])->fetch_assoc()['email'];?></cite>
                                                            <p><?php echo $commentInfoArray['date_created'];?></p>
                                                        </small>
                                                        <div class="list-comment-content-item"><?php echo $commentInfoArray['content'];?></div>
                                                    </footer>
                                                </div>
                                            </div>
                                        </li>
                                        <?php 
                                        }else{
                                            if($_SESSION['userId']==1||$commentInfoArray['user_id']==$_SESSION['userId']|| $_SESSION['active_class_roleId']==2){
                                        ?>
                                        <li class="list-group-item list-comment">
                                            <div class="card-header post-box-header comment-list-item-header">
                                                <img src="img/avatar.png" alt="avatar" class="avatar">
                                                <div class="post-detail">
                                                    <footer class="blockquote-footer">
                                                        <small class="text-muted">
                                                            <cite title="Source Title"><?php echo getUserInfo($conn,$commentInfoArray['user_id'])->fetch_assoc()['email'];?></cite>
                                                            <p><?php echo $commentInfoArray['date_created'];?></p>
                                                        </small>
                                                        <div class="list-comment-content-item"><?php echo $commentInfoArray['content'];?></div>
                                                    </footer>
                                                </div>
                                            </div>
                                        </li>
                                        <?php }}}} ?>
                                    </ul>
                                </div>
                                <form action="" method="post">
                                    <div class="comment-box comment-box-active">
                                        <img src="img/avatar.png" alt="avatar" class="avatar hidden-xs">
                                        <textarea class="comment-input col-9" name="comment-content" placeholder="Comment here..." cols="1" rows="1" required></textarea>
                                        <button name="post-public-comment-btn" class="post-comment-btn col-1" type='submit'>
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>   
                    </div>
                    <div class="col-md-4 sidebar">
                        <?php
                        if($activePostInfo['type']==1 && $_SESSION['active_class_roleId'] == 3){
                        ?>
                        <div id="questions-widget-2" class="widget questions-widget">
                            <h3 class="widget_title">Your work</h3>
                            <ul class="related-posts">
                                <li class="related-item">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <input type="file" name='turn-in-files' class='turn-in-input'>
                                        <button type="submit" name='turn-in-btn'>Turn in</button>
                                    </form>
                                </li>
                                <li class="related-item">
                                    <?php
                                    if(getStdFilesOfPost($conn, $activePostInfo['id']) != null){
                                        $files = getStdFilesOfPost($conn, $activePostInfo['id']);
                                        while($file = $files->fetch_assoc()){
                                            if($file['user_id']==$_SESSION['userId']||$_SESSION['active_post_role'] == 1){
                                                echo "<a href='verify.php?pf=".$file['path']."'>".$file['path']."</a><br> ";
                                            }
                                        }
                                    }
                                    ?>
                                </li>
                            </ul>
                        </div>
                        <?php } ?>
                        <div id="tag_cloud-2" class="widget comment-widget">
                            <h3 class="widget_title">Private Comment</h3>
                            <form action="" method="post">
                                <div class="comment-box comment-box-private comment-box-active">
                                    <textarea class="comment-input col-9" name="comment-content" placeholder="Comment here..." cols="1" rows="4" required></textarea>
                                    <button name="post-private-comment-btn" class="post-comment-btn col-1" type='submit'>
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                                        </svg>
                                    </button>
                                </div>
                            </form>
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
