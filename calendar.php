
	
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
                      <h1 class="col-md-6">Calendar</h1>
                      <div class="crumbs col-md-6">
                          <a href="home.php">Home</a>
                          <span class="crumbs-span">/</span>
                          <span class="current">Calendar</span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="instruction-box">
          <div class="container">
              <div class="row">
                <div class="total" id="blur">
                  <section class="body">
                    <div class="content">
                      <div class="calendar">
                        <div class="header">
                          <a data-action="prev-month" href="javascript:void(0)" title="Previous Month"><i></i></a>
                          <div class="text" data-render="month-year"></div>
                          <a data-action="next-month" href="javascript:void(0)" title="Next Month"><i></i></a>
                        </div>
                        <div class="months" data-flow="left">
                          <div class="month month-a">
                            <div class="render render-a"></div>
                          </div>
                          <div class="month month-b">
                            <div class="render render-b"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
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
