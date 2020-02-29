<?php

	include 'post/core/main.php';
	$check  = new Main;
	$get    = new Main;
	$send   = new Main;
   @$user_id = $_SESSION['user_id'];
   	//fetching user data by user_id
	$data  = $get->user_data($user_id);
	// fetching posts from database
	$post  = $get->posts();
	//check user submit  data
	if(isset($_POST['submit'])){
		$status  = $_POST['status'];
		//checking image if isset
		if (isset($_FILES['post_image'])===true) {
			//if image is not empty
			 if (empty($_FILES['post_image']['name']) ===true) {
				if(!empty($status)===true){
					$send->add_post($user_id,$status);
				}
			 	 }else {
			 	 //checking image format
				 $allowed = array('jpg','jpeg','gif','png');
				 $file_name = $_FILES['post_image']['name'];
				 $file_extn = strtolower(end(explode('.', $file_name)));
				 $file_temp = $_FILES['post_image']['tmp_name'];

				 if (in_array($file_extn, $allowed)===true) {
				 	$file_parh = 'post/images/posts/' . substr(md5(time()), 0, 10).'.'.$file_extn;
				   move_uploaded_file($file_temp, $file_parh);
				   $send->add_post($user_id,$status,$file_parh);

				 }else{
				  echo 'incorrect File only Allowed with less then 1mb ';
				  echo implode(', ', $allowed);
				 }
			 }

		}

	}
?>
<html>
	<head>
		<title>Posting System</title>
		<link rel="stylesheet" href="post/css/style.css"/>
		<script type="text/javascript" src="post/js/jquery.js"></script>

	</head>
<body>
	<!-----------Head-------->
<div class="head">
	<div class="head-in">
		<diV class="head-logo">
			<h1 class="h-1">newtech.com</h1>
		</div>
		<div id="login">
		
		</div>
	</div>
</div>


	<div class="wrapper">
		<!--content -->
		<div class="content">
			<!--left-content-->
			<div class="center">
				<div class="posts">
					<div class="create-posts">
 					<form action="" method="post" enctype="multipart/form-data">
						
						
						
						</div>
						</div>
						<script type="text/javascript">
						 //Image Preview Function
								$("#uploadTrigger").click(function(){
								   $("#uploadFile").click();
								});
						        function readURL(input) {
						            if (input.files && input.files[0]) {
						                var reader = new FileReader();

						                reader.onload = function (e) {
						                	$('#body-bottom').show();
						                    $('#preview').attr('src', e.target.result);
						                }

						                reader.readAsDataURL(input.files[0]);
						            }
						        }

						</script>
						<?php foreach($post as $row){
							//fetching all posts
							$time_ago = $row['status_time'];
						echo '
						<div class="post-show">
									<div class="post-show-inner">
										<div class="post-header">
											<div class="post-left-box">
												<div class="id-img-box"><img src="'.$row['profile_image'].'"></img></div>
												<div class="id-name">
													<ul>
														<li><a href="#">'.$row['username'].'</a></li>
														<li><small>'.$get->timeAgo($time_ago).'</small></li>
													</ul>
												</div>
											</div>
											<div class="post-right-box"></div>
										</div>

											<div class="post-body">
											<div class="post-header-text">
												'.$row['status'].'
											</div>'.( ($row['status_image'] != 'NULL') ? '<div class="post-img">
												<img src="'.$row['status_image'].'"></img></div>' : '').'
											<div class="post-footer">
												<div class="post-footer-inner">
													<ul>
														<li><a href="#">Like</a></li>
														<li><a href="#">Comment</a></li>
														<li><a href="#">Share</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div><br> ';
					}
				?>
					</div>
					</form>

			</div>



</div>
</body>
</html>
