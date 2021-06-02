<?php require_once("../includes/helpers/initialize.php"); ?>
<?php
//Activating our pagination system
//1. The current page number($current_page)
$page = !empty($_GET['page']) ? (int)$_GET['page']: 1;


//2. Records per page($per_page)
$per_page = 6;


//3. total record count ($total_count)
$total_count = Photograph::count_all();

//Find all photos
//use pagination instead
//$photos = Photograph::find_all();

$pagination = new Pagination($page, $per_page, $total_count);
//instead of finding all records, just find the record 
//for this page
$sql  = "SELECT * FROM house_details ORDER BY RAND() ";
$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";
$houses = Photograph::find_by_sql($sql);

//Need to add ?page=$page to all links we want to
//maintain the current page (or store $page in session)

?>
<?php
//Activating our pagination system
//1. The current page number($current_page)
$page = !empty($_GET['page']) ? (int)$_GET['page']: 1;


//2. Records per page($per_page)
$per_page = 3;


//3. total record count ($total_count)
$total_count = Photograph::count_all();

//Find all photos
//use pagination instead
//$photos = Photograph::find_all();

$pagination = new Pagination($page, $per_page, $total_count);
//instead of finding all records, just find the record 
//for this page
$sql  = "SELECT * FROM land_details ORDER BY RAND() ";
$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";
$lands = land::find_by_sql($sql);

//Need to add ?page=$page to all links we want to
//maintain the current page (or store $page in session)

?>





<!DOCTYPE html>
<html lang="en">
<head>
<title>Properites</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="myHOME - real estate template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/animate.css">
<link rel="stylesheet" type="text/css" href="styles/listings.css">
<link rel="stylesheet" type="text/css" href="styles/listings_responsive.css">
<script src="js/jquery-3.3.1.min.js"></script>
</head>
<body>

<div class="super_container">
	<div class="super_overlay"></div>
	
	<!-- Header -->

	<header class="header">
		
		<!-- Header Bar -->
		<div class="header_bar d-flex flex-row align-items-center justify-content-start">
			<div class="header_list">
				<ul class="d-flex flex-row align-items-center justify-content-start">
					<!-- Phone -->
					<li class="d-flex flex-row align-items-center justify-content-start">
						<div><img src="images/phone-call.svg" alt=""></div>
						<span>+2349066619111</span>
					</li>
					<!-- Address -->
					<li class="d-flex flex-row align-items-center justify-content-start">
						<div><img src="images/placeholder.svg" alt=""></div>
						<span>km. 2 okitipupa/igbokoda road, ayeka, Ondo State.</span>
					</li>
					<!-- Email -->
					<li class="d-flex flex-row align-items-center justify-content-start">
						<div><img src="images/envelope.svg" alt=""></div>
						<span>alabamahub600@gmail.com</span>
					</li>
				</ul>
			</div>
			<div class="ml-auto d-flex flex-row align-items-center justify-content-start">
				<div class="social">
					<ul class="d-flex flex-row align-items-center justify-content-start">
						<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					</ul>
				</div>

				<?php     
				$login_control = new LoginControl();
				$session = new Session();
				 if($session->is_logged_in()){ ?>

				<div class="log_reg d-flex flex-row align-items-center justify-content-start">
					<ul class="d-flex flex-row align-items-start justify-content-start">
						<li><a href="login/supdate.php?id=<?php echo $session->user_id;  ?>">Update Profile</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
				<?php }else{ ?>
					<div class="log_reg d-flex flex-row align-items-center justify-content-start">
					<ul class="d-flex flex-row align-items-start justify-content-start">
						<li><a href="login.php">Login</a></li>
						<li><a href="reg.php">Accomodation</a></li>
						
					</ul>
				</div>
				<?php } ?>
			</div>
		</div>

		<!-- Header Content -->
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			<div class="logo"><a href="#">AlabamaEstate<span>LTD</span></a></div>
			<nav class="main_nav">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					<li><a href="index.php">Home</a></li>
					<li><a href="about.php">About us</a></li>
					<li class="active"><a href="listings.php">Properties</a></li>
					<li><a href="blog.php">News</a></li>
					<li><a href="contact.php">Contact</a></li>
					<li><a href="monitor.php">Monitor</a></li>
				</ul>
			</nav>
			
		</div>

	</header>

	<!-- Menu -->

	<div class="menu text-right">
		<div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="menu_log_reg">
			<?php     
				$login_control = new LoginControl();
				//$session = new Session();
				 if($session->is_logged_in()){ ?>

				<div class="log_reg d-flex flex-row align-items-center justify-content-start">
					<ul class="d-flex flex-row align-items-start justify-content-start">
						<li><a href="supdate.php">Update Profile</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
				<?php }else{ ?>
					<div class="log_reg d-flex flex-row align-items-center justify-content-start">
					<ul class="d-flex flex-row align-items-start justify-content-start">
						<li><a href="login.php">Login</a></li>
						<li><a href="reg.php">Accomodation</a></li>
						
					</ul>
				</div>
				<?php } ?>
			<nav class="menu_nav">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="about.php">About us</a></li>
					<li><a href="listings.php">Properties</a></li>
					<li><a href="blog.php">News</a></li>
					<li><a href="contact.php">Contact</a></li>
					<li><a href="monitor.php">Monitor</a></li>
					<li><a href="reg.php">for accommondation</a></li>
					<li><a href="apply.php">Property registration</a></li>
				</ul>
			</nav>
		</div>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/listings.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_content text-center">
						<div class="home_title">Available properties for sale</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Search -->

	<div class="search">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="search_container">
					<div class="search_container">Property type</div>
					<button class="btn btn-success" id="land">land</button>
							<button class="btn btn-success" id="house">housing</button>

							<form action="sort.php" class="search_form" id="search_form">
							
								<!-- land option -->
							<div id="lan" style="">
								<div class="d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-start">
									<div class="search_inputs d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-start">
									<div class="form-input">
								<select class="tag tag_house" name="type" required >
									<option value="land" id="land"> Land </option>
								</select>
								<label class="tag tag_rent">Location : </label>
									<select class="tag tag_price" name="location" required>
										<option value="">&nbsp;</option>
										<option value="okitipupa"> Okitipupa </option>
										<option value="ayeka"> Ayeka </option>
										<option value="igodan">Igodan</option>
										<option value="okunmo">Okunmo</option>
										<option value="igbodigo">Igbodigo</option>
										<option value="ore">Ore</option>
										<option value="irele">Irele</option>
										<option value="igbokoda">Igbokoda</option>
									</select>
								</div>
												
												</div>
									<button class="search_button">Check for Vacancy</button>
									</div>
							</div>
							</form>

							<script >
								
  $(document).ready(function(){
         $("#house").click(function(){
         	$("#lan").fadeOut(100);
         	$("#haz").fadeIn(100);
         })    
         $("#land").click(function(){
         	$("#lan").fadeIn(100);
         	$("#haz").fadeOut(100);

         })       
     });
							</script>

								<!-- house option -->
							<form action="sort_house.php" class="search_form">

						<div id="haz" style="display: none">
						<div class="d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-start">
						<div class="search_inputs d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-start">
								<select class="tag tag_house" name="type" required>
									<option value="house" id="house"> House </option>
								</select>
								<select class="tag tag_house" name="type" required>
									<option value="room"> Single Room </option>
									<option value="self">Self Contain</option>
									<option value="flat"> Flat </option>
								</select>
								<label class="tag tag_rent">Location : </label>
								<select class="tag tag_price" name="location" required>
									<option value="">&nbsp;</option>
									<option value="okitipupa"> Okitipupa </option>
									<option value="ayeka"> Ayeka </option>
									<option value="igodan">Igodan</option>
									<option value="okunmo">Okunmo</option>
									<option value="igbodigo">Igbodigo</option>
									<option value="ore">Ore</option>
									<option value="irele">Irele</option>
									<option value="igbokoda">Igbokoda</option>
								</select>

								</div>
								<button class="search_button">Check for Vacancy</button>
								</div>
						</div>
							</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Listings -->

	<div class="listings">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<!-- Sorting -->
					<div class="sorting d-flex flex-md-row flex-column align-items-start justify-content-start">
						
						<!-- Tags -->
						<!-- <div class="listing_tags">
							<ul class="d-flex flex-row align-items-start justify-content-start flex-wrap">
								<li><a href="#">2 beds<span>x</span></a></li>
								<li><a href="#">2 baths<span>x</span></a></li>
								<li><a href="#">garage<span>x</span></a></li>
								<li><a href="#">swimming pool<span>x</span></a></li>
								<li><a href="#">patio<span>x</span></a></li>
								<li><a href="#">heated floors<span>x</span></a></li>
								<li><a href="#">garden<span>x</span></a></li>
							</ul>
						</div> -->

						<!-- Sort -->
						<div class="sorting_container">
							<div class="sort">
								<!-- <span class="area">Sort By Area</span>
								<ul>
									<li class="sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>Ayeka</li>
									<li class="sorting_button" data-isotope-option='{ "sortBy": "price" }'>Opa</li>
									<li class="sorting_button" data-isotope-option='{ "sortBy": "area" }'>Okun</li>
								</ul> -->
								<select class="sort" id="area">
								<option>Select Location</option>
									<option>AYEKA</option>
									<option>NDDC</option>
									<option>IGODAN</option>
									<option>OKITIPUPA</option>
								</select>
							</div>
						</div>

					</div>
					<script>
					$(document).ready(function(){
					$("#area").on("change",function(){
						var areas=$(this).val()
						$.ajax({
							url:"filterarea.php",
							method:"post",
							data:{
								area:areas
							}
						}).done(function(data){
							$("#houseCont").html(data);
							console.log(data);
						})
					})
					})
					</script>


					<!-- Listings Container -->
					<div id="houseCont" class="listings_container row">
						<?php foreach ($houses as $house): ?>
						<!-- Listing -->
						<div class="listing_box house sale">
							<div class="listing">
								<div class="listing_image">
									<div class="listing_image_container">
										<img src="<?php  echo $house->outside; ?>" alt="">
									</div>
									<div class="tags d-flex flex-row align-items-start justify-content-start flex-wrap">
										<div class="tag tag_house"><a href="listings.php">house</a></div>
										<div class="tag tag_sale"><a href="listings.php">for rent</a></div>
									</div>
									<div class="tag_price listing_price">&#8358; <?php  echo $house->price; ?></div>
								</div>
								<div class="listing_content">
									<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
										<img src="images/icon_1.png" alt="">
										<a href="single.php?id=<?php echo $house->id; ?>"><?php  echo $house->address; ?></a>
									</div>
									<div class="listing_info">
										<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
											<li class="property_area d-flex flex-row align-items-center justify-content-start">
												<img src="images/icon_2.png" alt="">
												<span>2500 sq ft</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="images/icon_3.png" alt="">
												<span>2</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="images/icon_4.png" alt="">
												<span>5</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="images/icon_5.png" alt="">
												<span>2</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
						
						</div>
					<!-- 	<?php endforeach; ?> -->


							<?php foreach ($lands as $land): ?>
							<!-- Listing -->
						<div class="listing_box house sale">
							<div class="listing">
								<div class="listing_image">
									<div class="listing_image_container">
										<img src="<?php  echo $land->outside; ?>" alt="">
									</div>
									<div class="tags d-flex flex-row align-items-start justify-content-start flex-wrap">
										<div class="tag tag_house"><a href="listings.php">house</a></div>
										<div class="tag tag_sale"><a href="listings.php">for Sale</a></div>
									</div>
									<div class="tag_price listing_price">&#8358; <?php  echo $land->price; ?></div>
								</div>
								<div class="listing_content">
									<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
										<img src="images/icon_1.png" alt="">
										<a href="single_land.php?id=<?php echo $land->id; ?>"><?php  echo $land->address; ?></a>
									</div>
									<div class="listing_info">
										<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
											<li class="property_area d-flex flex-row align-items-center justify-content-start">
												<img src="images/icon_2.png" alt="">
												<span><?php echo $land->size; ?></span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="images/icon_3.png" alt="">
												<span>2</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="images/icon_4.png" alt="">
												<span>5</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="images/icon_5.png" alt="">
												<span>2</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
						
						</div>

					<?php endforeach; ?>
						
		
					</div>
								<div id="pagination" style="clear: both; ">
					    <?php
					    if($pagination->total_pages() > 1){
					        
					        if($pagination->has_prevoius_page()){
					            echo "<a href=\"listings.php?page=";
					            echo $pagination->previous_page();
					            echo "\">&laquo; Previous</a> ";
					        }
					        
					        for($i=1; $i <= $pagination->total_pages(); $i++){
					             if($i == $page){
					                 echo " <span class=\"selected\">{$i}</span> ";
					             } else {
					                 echo " <a href=\"listings.php?page={$i}\">{$i}</a> "; 
					             }
					           
					        }
					        
					        if($pagination->has_next_page()){
					            echo "<a href=\"listings.php?page=";
					            echo $pagination->next_page();
					            echo "\">&raquo; Next</a> ";
					        }
					        
					    }
					    ?>
					</div>
					<br>
					<!-- <div class="load_more">
						<div class="button ml-auto mr-auto"><a href="#">load more</a></div>
					</div> -->
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
<?php require("footer.php"); ?>
	
</div>


<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.3.4/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="js/listings.js"></script>
</body>
</html>