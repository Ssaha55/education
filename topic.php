<?php
    include 'functions.php';
    getHeader();
	if(empty($_SESSION['user_id']))
    {
      echo "<script>location.href='index.php';</script>";
      exit;
    }
	$topicId = $_GET['row_id'];
	$topicData = getTopicDataById($topicId);
	$topicData = mysqli_fetch_array($topicData);
?>
<div class="all-title-box">
		<div class="container text-center">
			<h1><?php echo $topicData['name']; ?></h1>
		</div>
	</div>
	
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-12 blog-post-single">
                    <div class="blog-item">
						<div class="post-content">
							<div class="blog-desc">
								<?php echo $topicData['content']; ?>
							</div>							
						</div>
					</div>
					
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
<?php getFooter(); ?>