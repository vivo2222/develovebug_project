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

        <div class="banner section-warp infocenter-infotex rocket-lazyload">
            <div class="container clearfix">
                <div class="box_icon box_warp box_no_borde box_no_background">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Have a question?</h2>
                            <p>If you have any question you can ask below or enter what you are looking for!</p>
                            <div class="clearfix"></div>
                            <div class="clearfix"></div>
                            <div>
                                <div id="live-search">
                                    <div id="search-wrap">
                                        <form method="get" action="" id="searchform"
                                            class="form-style form-style-2 container">
                                            <p class="row">
                                                <input type="text"
                                                    onfocus="if (this.value == this.defaultValue) {this.value = '';}"
                                                    onblur="if(this.value=='')this.value=this.defaultValue;"
                                                    value="Type your search terms here" name="s" id="s"
                                                    class="col-md-10" autocapitalize="off" autocomplete="off"
                                                    autocorrect="off">
                                                <!-- <div class="hidden-xs"></div> -->
                                                <button type="submit" id="searchsubmit"
                                                    class="color button small publish-question ask-question-new-class col-md-1">
                                                    Search
                                                </button>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="main-content page-full-width">
            <div class="container">
                <div class="with-sidebar-container">
                    <ul class="tab-title nav nav-tabs justify-content-center row" id="myTab" role="tablist">
                        <li class="nav-item active" role="presentation">
                            <a class="nav-link active" id="class-tab" data-toggle="tab" href="#class" role="tab"
                                aria-controls="home" aria-selected="true">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-collection-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7z"/>
                                    <path fill-rule="evenodd" d="M2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z"/>
                                </svg>
                                <span class="hidden-xs">Your Classes</span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="question-tab" data-toggle="tab" href="#question" role="tab"
                                aria-controls="profile" aria-selected="false">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-patch-question-fll" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.933.87a2.89 2.89 0 0 1 4.134 0l.622.638.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636zM7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zm1.602-2.027c-.05.386-.218.627-.554.627-.377 0-.585-.317-.585-.745v-.11c0-.727.307-1.208.926-1.641.614-.44.822-.762.822-1.325 0-.638-.42-1.084-1.03-1.084-.55 0-.916.323-1.074.914-.109.364-.292.51-.564.51C6.203 6.12 6 5.873 6 5.48c0-.251.045-.468.139-.69.307-.798 1.079-1.29 2.099-1.29 1.341 0 2.262.902 2.262 2.227 0 .896-.376 1.511-1.05 1.986-.648.445-.806.726-.846 1.26z"/>
                                </svg>
                                <span class="hidden-xs">Recent Questions</span>    
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="response-tab" data-toggle="tab" href="#response" role="tab"
                                aria-controls="contact" aria-selected="false">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-reply-all-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.079 11.9l4.568-3.281a.719.719 0 0 0 0-1.238L8.079 4.1A.716.716 0 0 0 7 4.719V6c-1.5 0-6 0-7 8 2.5-4.5 7-4 7-4v1.281c0 .56.606.898 1.079.62z"/>
                                    <path fill-rule="evenodd" d="M10.868 4.293a.5.5 0 0 1 .7-.106l3.993 2.94a1.147 1.147 0 0 1 0 1.946l-3.994 2.94a.5.5 0 0 1-.593-.805l4.012-2.954a.493.493 0 0 1 .042-.028.147.147 0 0 0 0-.252.496.496 0 0 1-.042-.028l-4.012-2.954a.5.5 0 0 1-.106-.699z"/>
                                </svg>
                                <span class="hidden-xs">Recent Responses</span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="deadline-tab" data-toggle="tab" href="#deadline" role="tab"
                                aria-controls="contact" aria-selected="false">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar2-x-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 3.5c0-.276.244-.5.545-.5h10.91c.3 0 .545.224.545.5v1c0 .276-.244.5-.546.5H2.545C2.245 5 2 4.776 2 4.5v-1zm4.854 4.646a.5.5 0 1 0-.708.708L7.293 10l-1.147 1.146a.5.5 0 0 0 .708.708L8 10.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 10l1.147-1.146a.5.5 0 0 0-.708-.708L8 9.293 6.854 8.146z"/>
                                </svg>
                                <span class="hidden-xs">Deadlines</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active class-tab" id="class" role="tabpanel" aria-labelledby="class-tab">
                        <?php 
                        if($classes_list->num_rows > 0){
                            while($classesList = $classes_list->fetch_assoc()){ 
                                if(getClassInfo($conn, $classesList["class_id"])->num_rows > 0){
                                    $classInfoArray = getClassInfo($conn, $classesList["class_id"])->fetch_assoc();
                                
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
                                            <?php 
                                                $assignments_list = getAssignmentsListOfClass($conn, 1, $classInfoArray['id']);
                                                if($assignments_list->num_rows > 0){
                                                    while($assignmentsList = $assignments_list->fetch_assoc()){ 
                                                        if(getClassInfo($conn, $assignmentsList["id"])->num_rows > 0){
                                                            $assignmentInfoArray = getPostInfo($conn, $assignmentsList["id"])->fetch_assoc();
                                                            if($assignmentInfoArray['type'] == 1){
                                            ?>
                                            <li><a href="post-detail.php?classId=<?php echo $classInfoArray['id']; ?>&postId=<?php echo $assignmentInfoArray["id"]; ?>"><?php echo $assignmentInfoArray["title"]; ?></a></li>
                                            <?php }}}} ?>
                                        </ul>
                                        <footer class="blockquote-footer">
                                            <cite title="Source Title">    
                                                <small><i>Since 22/02/2001</i></small>
                                            </cite>
                                            <div class="hagtag-list open-class-btn open-icon">
                                                <a href="class.php?classId=<?php echo $classInfoArray['id']?>">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-return-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </footer>
                                    </blockquote>
                                </div>
                            </div>     
                        <?php }} }?>    
                        </div>
                        <div class="tab-pane fade" id="question" role="tabpanel" aria-labelledby="question-tab">
                            <div class="card post">
                                <div class="card-header">
                                    <div class="title-box">
                                        <div class="title">
                                            <a href="#"><h5>Title</h5></a>
                                        </div>
                                        <div class="overal-post-info-box">
                                            <span class="clock">
                                                <small>
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clock-history" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                                                        <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                                                        <path fill-rule="evenodd" d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                                                    </svg>
                                                4 YEARS
                                                </small>
                                            </span>
                                            <span class="view">
                                                <small>
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                                                        <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                    </svg>
                                                    12 VIEWS
                                                </small>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="user-info-box">
                                        <img src="img/avatar.png" alt="avatar" class="avatar">
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p class="question-content">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo numquam voluptas neque sapiente ab dicta aliquam, id error vitae, fugit est quasi, quos repellendus facilis corrupti veritatis repudiandae quaerat voluptatibus.
                                        </p>
                                        <footer class="blockquote-footer">
                                            vivo22
                                            <cite title="Source Title">    
                                                <small><i>votuongvi2222002@gmail.com</i></small>
                                            </cite>
                                            <div class="hagtag-list">
                                                <span><a href="#">#html</a></span>
                                                <span><a href="#">#javascript</a></span>
                                                <span><a href="#">#css</a></span>
                                            </div>
                                        </footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="response" role="tabpanel" aria-labelledby="response-tab">
                            <div class="card post post-comment">
                                <div class="card-header">
                                    <div class="title-box">
                                        <div class="overal-post-info-box">
                                            <span class="like">
                                                <small>
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hand-thumbs-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16v-1c.563 0 .901-.272 1.066-.56a.865.865 0 0 0 .121-.416c0-.12-.035-.165-.04-.17l-.354-.354.353-.354c.202-.201.407-.511.505-.804.104-.312.043-.441-.005-.488l-.353-.354.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581 0-.211-.027-.414-.075-.581-.05-.174-.111-.273-.154-.315L12.793 9l.353-.354c.353-.352.373-.713.267-1.02-.122-.35-.396-.593-.571-.652-.653-.217-1.447-.224-2.11-.164a8.907 8.907 0 0 0-1.094.171l-.014.003-.003.001a.5.5 0 0 1-.595-.643 8.34 8.34 0 0 0 .145-4.726c-.03-.111-.128-.215-.288-.255l-.262-.065c-.306-.077-.642.156-.667.518-.075 1.082-.239 2.15-.482 2.85-.174.502-.603 1.268-1.238 1.977-.637.712-1.519 1.41-2.614 1.708-.394.108-.62.396-.62.65v4.002c0 .26.22.515.553.55 1.293.137 1.936.53 2.491.868l.04.025c.27.164.495.296.776.393.277.095.63.163 1.14.163h3.5v1H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                                                    </svg>
                                                    4
                                                </small>
                                            </span>
                                            <span class="dislike">
                                                <small>
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hand-thumbs-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.378 1.378 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51.136.02.285.037.443.051.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.896 1.896 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.094 2.094 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.162 3.162 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28v1c.563 0 .901.272 1.066.56.086.15.121.3.121.416 0 .12-.035.165-.04.17l-.354.353.353.354c.202.202.407.512.505.805.104.312.043.44-.005.488l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.415-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.353.352.373.714.267 1.021-.122.35-.396.593-.571.651-.653.218-1.447.224-2.11.164a8.907 8.907 0 0 1-1.094-.17l-.014-.004H9.62a.5.5 0 0 0-.595.643 8.34 8.34 0 0 1 .145 4.725c-.03.112-.128.215-.288.255l-.262.066c-.306.076-.642-.156-.667-.519-.075-1.081-.239-2.15-.482-2.85-.174-.502-.603-1.267-1.238-1.977C5.597 8.926 4.715 8.23 3.62 7.93 3.226 7.823 3 7.534 3 7.28V3.279c0-.26.22-.515.553-.55 1.293-.138 1.936-.53 2.491-.869l.04-.024c.27-.165.495-.296.776-.393.277-.096.63-.163 1.14-.163h3.5v-1H8c-.605 0-1.07.08-1.466.217a4.823 4.823 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591z"/>
                                                    </svg>
                                                    12
                                                </small>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="user-info-box">
                                        <img src="img/avatar.png" alt="avatar" class="avatar">
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p class="question-content">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo numquam voluptas neque sapiente ab dicta aliquam, id error vitae, fugit est quasi, quos repellendus facilis corrupti veritatis repudiandae quaerat voluptatibus.
                                        </p>
                                        <footer class="blockquote-footer">
                                            vivo22
                                            <cite title="Source Title">    
                                                <small><i>votuongvi2222002@gmail.com</i></small>
                                            </cite>
                                            <div class="hagtag-list open-cmt-icon open-icon">
                                                <a href="#">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-return-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="deadline" role="tabpanel" aria-labelledby="deadline-tab">
                                    
                        </div>

                    </div>
                    <div class="tab-pagination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="statistical-boxs">
            <div class="container">
                <div class="row">
                    <div class="statistical-box col-xs-6 col-sm-3 col-md-3">
                        <div class="statistical-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                            </svg>
                        </div>
                        <div class="statistical-content">
                            <span>564</span>
                        </div>
                        <div class="statistical-object">
                            <span>Number of users</span>
                        </div>
                    </div>
                    <div class="statistical-box col-xs-6 col-sm-3 col-md-3">
                        <div class="statistical-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                <path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z"/>
                                <circle cx="3.5" cy="5.5" r=".5"/>
                                <circle cx="3.5" cy="8" r=".5"/>
                                <circle cx="3.5" cy="10.5" r=".5"/>
                            </svg>
                        </div>
                        <div class="statistical-content">
                            <span>1234</span>
                        </div>
                        <div class="statistical-object">
                            <span>Number of classes</span>
                        </div>
                    </div>
                    <div class="statistical-box col-xs-6 col-sm-3 col-md-3">
                        <div class="statistical-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-left-dots" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v11.586l2-2A2 2 0 0 1 4.414 11H14a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg>
                        </div>
                        <div class="statistical-content">
                            <span>23456</span>
                        </div>
                        <div class="statistical-object">
                            <span>number of conversations</span>
                        </div>
                    </div>
                    <div class="statistical-box col-xs-6 col-sm-3 col-md-3">
                        <div class="statistical-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-emoji-laughing" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path fill-rule="evenodd" d="M12.331 9.5a1 1 0 0 1 0 1A4.998 4.998 0 0 1 8 13a4.998 4.998 0 0 1-4.33-2.5A1 1 0 0 1 4.535 9h6.93a1 1 0 0 1 .866.5z"/>
                                <path d="M7 6.5c0 .828-.448 0-1 0s-1 .828-1 0S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 0-1 0s-1 .828-1 0S9.448 5 10 5s1 .672 1 1.5z"/>
                            </svg>
                        </div>
                        <div class="statistical-content">
                            <span>456</span>
                        </div>
                        <div class="statistical-object">
                            <span>happy clients</span>
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
