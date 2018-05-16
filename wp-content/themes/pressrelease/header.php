<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="<?php echo get_bloginfo( 'description' ); ?>">
    <meta name="author" content="">

    <title><?php echo get_bloginfo( 'name' ); ?></title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/6190532/709866/css/fonts.css" />
    <link href="<?php echo get_bloginfo('template_directory'); ?>/css/style.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	  
	<?php wp_head(); ?>
	  
  </head>

  <body>
	  
	<section id="login-top">
		<div class="container">			
			<div class="row">			
				<div class="col-xs-12">
<?php
	global $current_user;
	get_currentuserinfo();
	if ( is_user_logged_in() ) {
?>
					<p><span class="welcome">Welcome,</span> <?php echo $current_user->user_login ?> &nbsp; <a class="logout" href="<?php echo wp_logout_url() ?>">Logout</a></p>

					
<?php
	} else {
?>
					<p>Media Login <img class="padlock" src="<?php echo get_bloginfo('template_directory'); ?>/images/padlock.png" /></p>
					<form action="/wp-login.php" method="post">
						<input type="text" name="log" id="user_login" placeholder="Username" />
						<input type="password" name="pwd" id="user_pass" placeholder="Password" />
						<input type="submit" id="wp-submit" value="Go" />
					</form>					
<?php
	}
?>
				</div>				
			</div>
		</div>
	</section>

	<section id="hero">		
		<div class="container">			
			<div class="row">			
				<div class="col-xs-12">
					<a href="/home">
						<img class="logo-main" src="<?php echo get_bloginfo('template_directory'); ?>/images/logo-main.png" />
					</a>
				</div>				
			</div>
		</div>		
	</section> 
	  

	<section id="carousel">	
		<div id="slide-0" class="slide" data-slide-num="0">
			<div class="container">			
				<div class="row">			
					<div class="col-xs-12">					
						<div class="framer">						
							<div class="framee">
								<h1>Stay Connected At TCT 2018!</h1>
								<p>Follow @CRFheart, @TCTConference and #TCT2018<br />for the latest news from the meeting</p>
							</div>	
							<div class="carousel-nav">
								<span class="dot current" data-num="0"></span>
								<span class="dot" data-num="1"></span>
								<span class="dot" data-num="2"></span>
							</div>
						</div>
					</div>				
				</div>
			</div>	
		</div>
		<div id="slide-1" class="slide" data-slide-num="1">
			<div class="container">			
				<div class="row">			
					<div class="col-xs-12">					
						<div class="framer">						
							<div class="framee">
								<h1>Enhance Your Stories</h1>
								<p>on the lastest cardiology research with an infographic</p>
								<a class="pr-button" href="#">Click Here to Download</a>							
							</div>	
							<div class="carousel-nav">
								<span class="dot" data-num="0"></span>
								<span class="dot current" data-num="1"></span>
								<span class="dot" data-num="2"></span>
							</div>							
						</div>
					</div>				
				</div>
			</div>	
		</div>
		<div id="slide-2" class="slide" data-slide-num="2">
			<div class="container">			
				<div class="row">			
					<div class="col-xs-12">					
						<div class="framer">						
							<div class="framee">
								<h1>Check out our Resources Page</h1>
								<p>for a list of TCT Experts available for interviews</p>
							</div>
							<div class="carousel-nav">
								<span class="dot" data-num="0"></span>
								<span class="dot" data-num="1"></span>
								<span class="dot current" data-num="2"></span>
							</div>
							
						</div>
					</div>				
				</div>
			</div>	
		</div>
	</section> 
	  
<?php
if (is_user_logged_in()) {
?>	  
	<nav id="main">		
		<div class="container">			
			<div class="row">			
				<div class="col-xs-12">	 					
					<ul>					
						<?php wp_list_pages( '&title_li=' ); ?>
					</ul>
				</div>				
			</div>
		</div>			
	</nav>
<?php
}
?>