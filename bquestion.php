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
                    <input type="text" placeholder="Class Code" required>
                    </div>
                    <div class="field btn">
                    <div class="btn-layer"></div>
                    <input type="submit" name="join-btn" value="Join">
                    </div>
                </form>
                <form action="#" class="create">
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
                    <input type="submit" name="create-btn" value="Create">
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
                        <h1 class="col-md-6">Browser Questions</h1>
                        <div class="crumbs col-md-6">
                            <a href="home.php">Home</a>
                            <span class="crumbs-span">/</span>
                            <span class="current">Browser Questions</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="q-main-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
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
