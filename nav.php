
<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 hidden-xs">
                <ul class="nav top-nav nav-left" id="menu-left-top-bar">
                    <li class="nav-item"><a class="nav-link" href="home.php">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="calendar.php">CALENDAR</a></li>
                </ul>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <ul class="nav justify-content-end top-nav nav-right" id="menu-not-login-top-bar">
                    <li id="nav-menu-item-100"
                        class="nav-item dropdown menu-item-even menu-item-depth-0 login-comments menu-item menu-item-type-custom menu-item-object-custom">
                        <a class="nav-link" href="logout.php">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-lock" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11.5 8h-7a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1zm-7-1a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-7zm0-3a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/>
                            </svg>
                            LOGOUT
                        </a>
                    </li>
                    <li id="nav-menu-item-100" class="nav-item dropdown menu-item-even menu-item-depth-0 login-comments menu-item menu-item-type-custom menu-item-object-custom">
                        <button type="button" class="tooltip-btn btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Join or create class">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="add-icon bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="header">
    <div class="container clearfix">

        <div class="row">
            <div class="logo col-md-4">
                <a href="home.php" class="logo-img">
                    <img src="img/logo.png" alt="" class="logo-default lazyloaded">
                </a>
            </div>
            <nav class="navigation col-md-8 hidden-xs">
                <div class="header-menu">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link active" href="howitworks.php">How it works?</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="classes.php">Classes</a>
                        </li>
                        <li class="nav-item menu-item-pq">
                            <a class="nav-link" href="post-form.php?ci=<?php echo $activeClassInfo['id']?>">Add Post / Share</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <nav class="navigation_mobile navigation_mobile_main">
                <div class="infocenter_mobile_click infocenter_mobile_click_close">
                    Go to ...
                </div>
                <ul>
                    <li>
                        <a href="howitworks.php">How it works?</a>
                    </li>
                    <li>
                        <a href="#">Assignments</a>
                    </li>
                    <li>
                        <a href="calendar.php">Calendar</a>
                    </li>
                    <li class="menu-item-pq">
                        <a href="post-form.php?ci=<?php echo $activeClassInfo['id']?>">Add post / Share</a>
                    </li>
                </ul>
            </nav>
        </div>
        </nav>
    </div>
</div>
