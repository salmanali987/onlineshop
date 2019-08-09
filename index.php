<?php

	$i=1;
	session_start();
	include "php/connection.php";
	if(isset($_GET['action']) && $_GET['action']=="add"){
		$id=intval($_GET['id']);

		$sql_p="SELECT * FROM product WHERE product_id='$id'";
		$query_p=mysqli_query($obj,$sql_p);
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['id'][$_SESSION['index']]=$row_p['product_id'];
			$_SESSION['quantity'][$_SESSION['index']]=1;
			$_SESSION['index']++;
			$_SESSION['total_p']+=intval($row_p['price_per_item']);
			header('location:index.php?page=product&action=no');

	}
	else if(isset($_GET['action']) && $_GET['action']=="no"){

	}
	else{
		$_SESSION['id']=array();
		$_SESSION['quantity']=array();
		$_SESSION['index']=0;
		$_SESSION['total_p']=0;
	}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="">
    <meta name="author" content="">

    <title>Shopping Center</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/Theme.css" rel="stylesheet" type="text/css">
	<link href="css/Slider.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/bootstrap-select.min.css">
  </head>

	<body id="page-top">

    <!-- Navigation -->
		<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
			<div class="container-fluid">
				<a class="navbar-brand js-scroll-trigger" href="#page-top">Start Bootstrap</a>
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    				<span class="navbar-toggler-icon"></span>
    			</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
    				<ul class="navbar-nav mr-auto">
						<li class="nav-item">
						  <a class="nav-link" href="#portfolio">Portfolio</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="#about">About</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="#team">Team</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="#contact">Contact</a>
						</li>
						<li class="navbar dropdown">
    						<a class="navlink dropdown-toggle" data-toggle="dropdown" href="#"><b>Sign in/up</b>
    						</a>

    						<div class="dropdown-menu dropdown-user">
    							<a class="dropdown-item" href="pages/sign_in.php">Sign in</a>
    							<a class="dropdown-item" href="pages/sign_up.php">Sign up</a>
    						</div>
    					</li>
						<li class="navbar dropdown" id="cart">
    						<a class="navlink dropdown-toggle" id="cart-btn" data-toggle="dropdown" href="#">
								<b>Cart</b>
								<input class="form-control" value=<?php  echo 'Rs.'.$_SESSION['total_p'];?>>
								<i class="fa fa-shopping-cart"></i>
    						</a>

    						<div class="dropdown-menu dropdown-user" id="down-menu">
    							<ul>
									<?php

										for($i=0;$i<$_SESSION['index'];$i++){
											$pro=$_SESSION['id'][$i];
											$sql = "SELECT * FROM product WHERE product_id='$pro'";
											$query=mysqli_query($obj,$sql);
											$row = mysqli_fetch_array($query);

									?>
									<li>

											<div class="row">
												<div class="col-xs-4">
													<div class="image">
														<a href="detail.html"><img  src="admin/img/<?php echo $row['product_img'];?>" width="35" height="50" alt=""></a>
													</div>
												</div>
												<div class="col-xs-7">

													<h5 class="name"><a href="index.php?page-detail"><?php echo $row['product_name']; ?></a></h5>
													<div class="price">Rs.<?php echo $row['price_per_item']; ?></div>
												</div>

											</div>
									</li>
									<hr/>
									<?php  }?>
								</ul>
								<hr/>
								<label>Total = <?php  echo htmlentities($_SESSION['total_p']);?></label>
								<br/>
    							<a class="btn btn-primary" href="pages/order_it.php">My Cart</a>
    						</div>
    					</li>
					</ul>
				</div>
			</div>
		</nav>

    <!-- Header -->
		<header class="masthead">
		  <div class="container">
			<div class="intro-text">
			  <div class="intro-lead-in">Welcome To Our Shopping Center!</div>
			  <div class="intro-heading text-uppercase">Here You will Find The Amazing items!</div>
			  <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">More Details</a>
			</div>
		  </div>
		</header>

    <!-- Services -->
		<section id="services">
		  <div class="container">
			<div class="row">
			  <div class="col-lg-12 text-center">
				<h2 class="section-heading text-uppercase">Services</h2>
				<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
			  </div>
			</div>
			<div class="row text-center">
			  <div class="col-md-4">
				<span class="fa-stack fa-4x">
				  <i class="fas fa-circle fa-stack-2x text-primary"></i>
				  <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
				</span>
				<h4 class="service-heading">E-Commerce</h4>
				<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
			  </div>
			  <div class="col-md-4">
				<span class="fa-stack fa-4x">
				  <i class="fas fa-circle fa-stack-2x text-primary"></i>
				  <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
				</span>
				<h4 class="service-heading">Responsive Design</h4>
				<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
			  </div>
			  <div class="col-md-4">
				<span class="fa-stack fa-4x">
				  <i class="fas fa-circle fa-stack-2x text-primary"></i>
				  <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
				</span>
				<h4 class="service-heading">Web Security</h4>
				<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
			  </div>
			</div>
		  </div>
		</section>

		<div class="row">
		<div class="col-md-12">
			<h2>Featured <b>Products</b></h2>
			<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
			<!-- Wrapper for carousel items -->
			<div class="carousel-inner">
				<div class="item carousel-item active">
					<div class="row">
						<?php

						$ret=mysqli_query($obj,"select * from product where product_id>=1 and product_id<=4 and not(total_items=0)");
						while ($row=mysqli_fetch_array($ret))
						{
									# code...?>
						<div class="col-sm-3">
							<div class="thumb-wrapper">
								<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
								<div class="img-box">
									<img src="admin/img/<?php echo htmlentities($row['product_img']);?>" data-echo="img/<?php echo htmlentities($row['product_img']);?>" class="img-responsive img-fluid" width="180" height="300" alt="">
								</div>
								<div class="thumb-content">
									<h4><a href="pages/details.php?pid=<?php echo htmlentities($row['product_id']);?>"><?php echo htmlentities($row['product_name']);?></a></h4>
									<p class="item-price"><strike>Rs.<?php echo htmlentities($row['price_per_item']);?> </strike> <span>Rs.<?php echo htmlentities($row['price_per_item']);?> </span></p>
									<div class="star-rating">
										<ul class="list-inline">
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star-o"></i></li>
										</ul>
									</div>
									<a href="index.php?page=product&action=add&id=<?php echo $row['product_id']; ?>" class="lnk btn btn-primary">Add to Cart</a>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
						<div class="item carousel-item">
					<div class="row">
						<?php

						$ret=mysqli_query($obj,"select * from product where product_id>=5 and product_id<=8 and not(total_items=0)");
						while ($row=mysqli_fetch_array($ret))
						{
									# code...?>
						<div class="col-sm-3">
							<div class="thumb-wrapper">
								<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
								<div class="img-box">
									<img src="admin/img/<?php echo htmlentities($row['product_img']);?>" data-echo="img/<?php echo htmlentities($row['product_img']);?>" class="img-responsive img-fluid" width="180" height="300" alt="">
								</div>
								<div class="thumb-content">
									<h4><a href="pages/details.php?pid=<?php echo htmlentities($row['product_id']);?>"><?php echo htmlentities($row['product_name']);?></a></h4>
									<p class="item-price"><strike>Rs.<?php echo htmlentities($row['price_per_item']);?> </strike> <span>Rs.<?php echo htmlentities($row['price_per_item']);?> </span></p>
									<div class="star-rating">
										<ul class="list-inline">
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star-o"></i></li>
										</ul>
									</div>
									<a href="index.php?page=product&action=add&id=<?php echo $row['product_id']; ?>" class="lnk btn btn-primary">Add to Cart</a>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
		</div>
		<!-- Carousel controls -->
		<a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		</a>
		<a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
		</a>
	</div>
</div>
</div>


    <!-- Portfolio Grid -->
		<section class="bg-light" id="portfolio">
		  <div class="container">
			<div class="row">
			  <div class="col-lg-12 text-center">
				<h2 class="section-heading text-uppercase">Portfolio</h2>
				<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
			  </div>
			</div>
			<div class="row">
				<?php
					$ret=mysqli_query($obj,"select * from product where product_id<=6");
					while ($row=mysqli_fetch_array($ret))
					{
				?>
			  <div class="col-md-4 col-sm-6 portfolio-item">
				<a class="portfolio-link" data-toggle="modal" href="#portfolioModal<?php echo htmlentities($row['product_id']);?>">
				  <div class="portfolio-hover">
					<div class="portfolio-hover-content">
					  <i class="fas fa-plus fa-3x"></i>
					</div>
				  </div>
				  <img class="img-fluid" src="admin/img/<?php echo htmlentities($row['product_img']);?>" width="250" height="250" alt="">
				</a>
				<div class="portfolio-caption">
				  <h4><?php echo htmlentities($row['product_name']);?></h4>
				  <p class="text-muted"><?php echo htmlentities($row['product_brand']);?></p>
				</div>
			  </div>
			  <?php } ?>
			</div>
		  </div>
		</section>

    <!-- About -->
		<section id="about">
		  <div class="container">
			<div class="row">
			  <div class="col-lg-12 text-center">
				<h2 class="section-heading text-uppercase">About</h2>
				<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
			  </div>
			</div>
			<div class="row">
			  <div class="col-lg-12">
				<ul class="timeline">
				  <li>
					<div class="timeline-image">
					  <img class="rounded-circle img-fluid" src="img/about/1.jpg" alt="">
					</div>
					<div class="timeline-panel">
					  <div class="timeline-heading">
						<h4>2009-2011</h4>
						<h4 class="subheading">Our Humble Beginnings</h4>
					  </div>
					  <div class="timeline-body">
						<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
					  </div>
					</div>
				  </li>
				  <li class="timeline-inverted">
					<div class="timeline-image">
					  <img class="rounded-circle img-fluid" src="img/about/2.jpg" alt="">
					</div>
					<div class="timeline-panel">
					  <div class="timeline-heading">
						<h4>March 2011</h4>
						<h4 class="subheading">An Agency is Born</h4>
					  </div>
					  <div class="timeline-body">
						<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
					  </div>
					</div>
				  </li>
				  <li>
					<div class="timeline-image">
					  <img class="rounded-circle img-fluid" src="img/about/3.jpg" alt="">
					</div>
					<div class="timeline-panel">
					  <div class="timeline-heading">
						<h4>December 2012</h4>
						<h4 class="subheading">Transition to Full Service</h4>
					  </div>
					  <div class="timeline-body">
						<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
					  </div>
					</div>
				  </li>
				  <li class="timeline-inverted">
					<div class="timeline-image">
					  <img class="rounded-circle img-fluid" src="img/about/4.jpg" alt="">
					</div>
					<div class="timeline-panel">
					  <div class="timeline-heading">
						<h4>July 2014</h4>
						<h4 class="subheading">Phase Two Expansion</h4>
					  </div>
					  <div class="timeline-body">
						<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
					  </div>
					</div>
				  </li>
				  <li class="timeline-inverted">
					<div class="timeline-image">
					  <h4>Be Part
						<br>Of Our
						<br>Story!</h4>
					</div>
				  </li>
				</ul>
			  </div>
			</div>
		  </div>
		</section>

    <!-- Team -->
		<section class="bg-light" id="team">
		  <div class="container">
			<div class="row">
			  <div class="col-lg-12 text-center">
				<h2 class="section-heading text-uppercase">Our Amazing Team</h2>
				<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
			  </div>
			</div>
			<div class="row">
			  <div class="col-sm-4">
				<div class="team-member">
				  <img class="mx-auto rounded-circle" src="img/team/1.jpg" alt="">
				  <h4>Kay Garland</h4>
				  <p class="text-muted">Lead Designer</p>
				  <ul class="list-inline social-buttons">
					<li class="list-inline-item">
					  <a href="#">
						<i class="fab fa-twitter"></i>
					  </a>
					</li>
					<li class="list-inline-item">
					  <a href="#">
						<i class="fab fa-facebook-f"></i>
					  </a>
					</li>
					<li class="list-inline-item">
					  <a href="#">
						<i class="fab fa-linkedin-in"></i>
					  </a>
					</li>
				  </ul>
				</div>
			  </div>
			  <div class="col-sm-4">
				<div class="team-member">
				  <img class="mx-auto rounded-circle" src="img/team/2.jpg" alt="">
				  <h4>Larry Parker</h4>
				  <p class="text-muted">Lead Marketer</p>
				  <ul class="list-inline social-buttons">
					<li class="list-inline-item">
					  <a href="#">
						<i class="fab fa-twitter"></i>
					  </a>
					</li>
					<li class="list-inline-item">
					  <a href="#">
						<i class="fab fa-facebook-f"></i>
					  </a>
					</li>
					<li class="list-inline-item">
					  <a href="#">
						<i class="fab fa-linkedin-in"></i>
					  </a>
					</li>
				  </ul>
				</div>
			  </div>
			  <div class="col-sm-4">
				<div class="team-member">
				  <img class="mx-auto rounded-circle" src="img/team/3.jpg" alt="">
				  <h4>Diana Pertersen</h4>
				  <p class="text-muted">Lead Developer</p>
				  <ul class="list-inline social-buttons">
					<li class="list-inline-item">
					  <a href="#">
						<i class="fab fa-twitter"></i>
					  </a>
					</li>
					<li class="list-inline-item">
					  <a href="#">
						<i class="fab fa-facebook-f"></i>
					  </a>
					</li>
					<li class="list-inline-item">
					  <a href="#">
						<i class="fab fa-linkedin-in"></i>
					  </a>
					</li>
				  </ul>
				</div>
			  </div>
			</div>
			<div class="row">
			  <div class="col-lg-8 mx-auto text-center">
				<p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
			  </div>
			</div>
		  </div>
		</section>

    <!-- Clients -->
		<section class="py-5">
		  <div class="container">
			<div class="row">
			  <div class="col-md-3 col-sm-6">
				<a href="#">
				  <img class="img-fluid d-block mx-auto" src="img/logos/envato.jpg" alt="">
				</a>
			  </div>
			  <div class="col-md-3 col-sm-6">
				<a href="#">
				  <img class="img-fluid d-block mx-auto" src="img/logos/designmodo.jpg" alt="">
				</a>
			  </div>
			  <div class="col-md-3 col-sm-6">
				<a href="#">
				  <img class="img-fluid d-block mx-auto" src="img/logos/themeforest.jpg" alt="">
				</a>
			  </div>
			  <div class="col-md-3 col-sm-6">
				<a href="#">
				  <img class="img-fluid d-block mx-auto" src="img/logos/creative-market.jpg" alt="">
				</a>
			  </div>
			</div>
		  </div>
		</section>

		<!-- Contact -->
		<section id="contact">
		  <div class="container">
			<div class="row">
			  <div class="col-lg-12 text-center">
				<h2 class="section-heading text-uppercase">Contact Us</h2>
				<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
			  </div>
			</div>
			<div class="row">
			  <div class="col-lg-12">
				<form id="contactForm" name="sentMessage" novalidate="novalidate">
				  <div class="row">
					<div class="col-md-6">
					  <div class="form-group">
						<input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name.">
						<p class="help-block text-danger"></p>
					  </div>
					  <div class="form-group">
						<input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address.">
						<p class="help-block text-danger"></p>
					  </div>
					  <div class="form-group">
						<input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number.">
						<p class="help-block text-danger"></p>
					  </div>
					</div>
					<div class="col-md-6">
					  <div class="form-group">
						<textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
						<p class="help-block text-danger"></p>
					  </div>
					</div>
					<div class="clearfix"></div>
					<div class="col-lg-12 text-center">
					  <div id="success"></div>
					  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
					</div>
				  </div>
				</form>
			  </div>
			</div>
		  </div>
		</section>

		<!-- Footer -->
		<footer>
		  <div class="container">
			<div class="row">
			  <div class="col-md-4">
				<span class="copyright">Copyright &copy; Your Website 2018</span>
			  </div>
			  <div class="col-md-4">
				<ul class="list-inline social-buttons">
				  <li class="list-inline-item">
					<a href="#">
					  <i class="fab fa-twitter"></i>
					</a>
				  </li>
				  <li class="list-inline-item">
					<a href="#">
					  <i class="fab fa-facebook-f"></i>
					</a>
				  </li>
				  <li class="list-inline-item">
					<a href="#">
					  <i class="fab fa-linkedin-in"></i>
					</a>
				  </li>
				</ul>
			  </div>
			</div>
		  </div>
		</footer>

		<!-- Footer End -->

		<!-- Portfolio Modals -->

		<!-- Modal 1 -->
		<?php
					$ret=mysqli_query($obj,"select * from product where product_id<=6");
					while ($row=mysqli_fetch_array($ret))
					{
		?>
		<div class="portfolio-modal modal fade" id="portfolioModal<?php echo htmlentities($row['product_id']);?>" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="close-modal" data-dismiss="modal">
				<div class="lr">
				  <div class="rl"></div>
				</div>
			  </div>
			  <div class="container">
				<div class="row">
				  <div class="col-lg-8 mx-auto">
					<div class="modal-body">
					  <!-- Project Details Go Here -->
					  <h2 class="text-uppercase" ><?php echo htmlentities($row['product_name']);?></h2>
					  <p class="item-intro text-muted"><?php echo htmlentities($row['product_brand']);?></p>
					  <img class="img-fluid d-block mx-auto" src="admin/img/<?php echo htmlentities($row['product_img']);?>" width="250" height="250" alt="">
					  <p><?php echo htmlentities($row['product_description']);?></p>
					  <ul class="list-inline">
						<li>Dated: <?php echo htmlentities($row['date_created']);?></li>
						<li>Price: <?php echo htmlentities($row['price_per_item']);?></li>
					  </ul>
					  <button class="btn btn-primary" data-dismiss="modal" type="button">
						<i class="fas fa-times"></i>
						Close</button>
					</div>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
		<?php } ?>

    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/agency.js"></script>
	<script src="js/jquery.easing.js"></script>
  </body>

</html>
