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
	
    
<?php getFooter(); ?>