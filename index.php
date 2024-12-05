<?php include_once 'helpers/helper.php'; ?>
	<?php subview('header.php'); 
    require 'helpers/init_conn_db.php';                      
	?>
	
<head>
	<link rel="stylesheet" href="assets/css/index.css">
	<link rel="stylesheet" type="text/css" href="styles%2c_bootstrap4%2c_bootstrap.min.css%2bplugins%2c_font-awesome-4.7.0%2c_css%2c_font-awesome.min.css%2bplugins%2c_OwlCarousel2-2.2.1%2c_owl.carousel.css%2bplugins%2c_OwlCarousel2-2.2.1%2c_owl" />
	<meta name="keywords" content="Flight Ticket Booking  Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
</head>
<?php
    if(isset($_GET['error'])) {
        if($_GET['error'] === 'sameval') {
		  echo '<script>alert("Chọn giá trị khác nhau cho thành phố khởi hành và thành phố đến")</script>';
      } else if($_GET['error'] === 'seldep') {
          echo '<script>alert("Chọn thành phố khởi hành")</script>';
      } else if($_GET['error'] === 'selarr') {
          echo"<script>alert('Chọn thành phố đến')</script>";
      }
    }
?>

	
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } ;</script>	
	<div class="main-agileinfo">
		<h1 class="text-light brand mt-2">
			<img src="assets/images/airtic.png" 
				height="105px" width="105px" alt="">				
		Flight Booking</h1>
		<div class="sap_tabs">			
			<div id="horizontalTab">
				<ul class="resp-tabs-list">
					<li class="resp-tab-item"><span>Khứ Hồi</span></li>
					<li class="resp-tab-item"><span>Một Chiều</span></li>
				</ul>	
				<div class="clearfix"> </div>	
				<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content roundtrip">
						<form action="book_flight.php" method="post">
							<input type="hidden" name="type" value="round">
							<div class="from">
								<h3 style="color: rgba(255, 255, 255, 0.767);">Từ</h3>
								<?php
								$sql = 'SELECT * FROM Cities ';
								$stmt = mysqli_stmt_init($conn);
								mysqli_stmt_prepare($stmt,$sql);         
								mysqli_stmt_execute($stmt);          
								$result = mysqli_stmt_get_result($stmt);    
								echo '<select class="" name="dep_city" id="w3_country1">
								<option value="0" selected disabled >Hà Nội</option>';
								while ($row = mysqli_fetch_assoc($result)) {
								echo '<option value="' . $row['city'] . '">' . $row['city'] . '</option>';
								}
								?>
								</select>  
							</div>
							<div class="to">
								<h3 style="color: rgba(255, 255, 255, 0.767);">Đến</h3>
								<?php
								$sql = 'SELECT * FROM Cities ';
								$stmt = mysqli_stmt_init($conn);
								mysqli_stmt_prepare($stmt,$sql);         
								mysqli_stmt_execute($stmt);          
								$result = mysqli_stmt_get_result($stmt);    
								echo '<select value="0" name="arr_city" id="w3_country1">
								<option selected disabled>Hồ Chí Minh</option>';
								while ($row = mysqli_fetch_assoc($result)) {
								echo '<option value="' . $row['city'] . '">' . $row['city'] . '</option>';
								}
								?>
								</select>							
							</div>
							<div class="clear"></div>
							<div class="date">
								<div class="depart">
									<h3 style="color: rgba(255, 255, 255, 0.767);">Ngày Khởi Hành</h3>
									<input class="form-control" name="dep_date" type="date"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
								</div>
								<div class="return">
									<h3 style="color: rgba(255, 255, 255, 0.767);">Ngày Trở Lại</h3>
									<input class="form-control"  name="ret_date" type="date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
								</div>
								<div class="clear"></div>
							</div>
							<div class="class">
								<h3 style="color: rgba(255, 255, 255, 0.767);">Hạng Ghế</h3>
								<select id="w3_country1" 
									name="f_class" onchange="change_country(this.value)" class="frm-field required">
									<option value="E">Phổ Thông</option>  
									<option value="B">Thương Gia</option>   
								</select>

							</div>
							<div class="clear"></div>
							<div class="numofppl">
								<div class="adults">
									<h3 style="color: rgba(255, 255, 255, 0.767);">Số Hành Khách</h3>
									<div class="quantity"> 
										<div class="quantity-select">                           
											<div class="entry value-minus">&nbsp;</div>
											<div class="entry value"><span>1</span></div>
											<input type="hidden" name="passengers"
												 class="input_val" value="1">
											<div class="entry value-plus active">&nbsp;</div>
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
							<input type="submit" value="Tìm chuyến bay" name="search_but">
						</form>						
					</div>		
					<div class="tab-1 resp-tab-content oneway">
						<form action="book_flight.php" method="post">
							<input type="hidden" name="type" value="one">
							<div class="from">
								<h3 style="color: rgba(255, 255, 255, 0.767);">Từ</h3>								
								<?php
								$sql = 'SELECT * FROM Cities ';
								$stmt = mysqli_stmt_init($conn);
								mysqli_stmt_prepare($stmt,$sql);         
								mysqli_stmt_execute($stmt);          
								$result = mysqli_stmt_get_result($stmt);    
								echo '<select value="0" name="dep_city" id="w3_country1">
								<option selected disabled>Hà Nội</option>';
								while ($row = mysqli_fetch_assoc($result)) {
								echo '<option value="' . $row['city'] . '">' . $row['city'] . '</option>';
								}
								?>
								</select> 														
							</div>
							<div class="to">
								<h3>Đến</h3>								
								<?php
								$sql = 'SELECT * FROM Cities ';
								$stmt = mysqli_stmt_init($conn);
								mysqli_stmt_prepare($stmt,$sql);         
								mysqli_stmt_execute($stmt);          
								$result = mysqli_stmt_get_result($stmt);    
								echo '<select value="0" name="arr_city" id="w3_country1">
								<option selected disabled>Hồ Chí Minh</option>';
								while ($row = mysqli_fetch_assoc($result)) {
								echo '<option value="' . $row['city'] . '">' . $row['city'] . '</option>';
								}
								?>
								</select>									
							</div>
							<div class="clear"></div>
							<div class="date">
								<div class="depart">
									<h3 style="color: rgba(255, 255, 255, 0.767);">Ngày Khởi Hành</h3>
									<input name="dep_date" type="date" 
										class="form-control"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
								</div>
							</div>
							<div class="class">
								<h3 style="color: rgba(255, 255, 255, 0.767);">Hạng Ghế</h3>
								<select id="w3_country1" name="f_class"
									onchange="change_country(this.value)" class="frm-field required">
									<option value="E">Phổ Thông</option>  
									<option value="B">Thương Gia</option>   
								</select>

							</div>
							<div class="clear"></div>
							<div class="numofppl">
								<div class="adults">
									<h3 style="color: rgba(255, 255, 255, 0.767);">Số Hành Khách</h3>
									<div class="quantity"> 
										<div class="quantity-select">                           
											<div class="entry value-minus">&nbsp;</div>
											<div class="entry value"><span>1</span></div>
											<input type="hidden" name="passengers"
												 class="input_val" value="1">											
											<div class="entry value-plus active">&nbsp;</div>
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
							<input type="submit" value="Tìm chuyến bay" name="search_but">
						</form>																				
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>

<div class="conatiner-fluid p-4" style="background-color: whitesmoke;margin-top:150px;">
   <!-- <h2 class="text-center mb-3 mt-3 display-4"
	   style="font-style: normal;font-size:80px;">Main Attractions In India</h2>   
	<div class="row p-5 pb-0"> -->

<!-- Intro -->
<div class="intro">
            <div class="intro_background" style="background-image:url(images/intro.png)"></div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="intro_container">
                            <div class="row">
                                <!-- Intro Item -->
                                <div class="col-lg-4  intro_col">
                                    <div class="intro_item d-flex flex-row align-items-end justify-content-start">
                                        <div class="intro_icon"><img src="assets/images/beach.svg" alt=""></div>
                                        <div class="intro_content">
                                            <div class="intro_title">Top Điểm Đến</div>
                                            <div class="intro_subtitle">
                                                <p>Có gì trong danh sách nhóm du lịch của bạn?</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Intro Item -->
                                <div class="col-lg-4 intro_col">
                                    <div class="intro_item d-flex flex-row align-items-end justify-content-start">
                                        <div class="intro_icon"><img src="assets/images/wallet.svg" alt=""></div>
                                        <div class="intro_content">
                                            <div class="intro_title">Giá tốt nhất</div>
                                            <div class="intro_subtitle">
                                                <p>Ghé thăm những địa điểm yêu thích của bạn với mức giá hợp lý</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Intro Item -->
                                <div class="col-lg-4 intro_col">
                                    <div class="intro_item d-flex flex-row align-items-end justify-content-start">
                                        <div class="intro_icon"><img src="assets/images/suitcase.svg" alt=""></div>
                                        <div class="intro_content">
                                            <div class="intro_title">Dịch vụ tuyệt vời</div>
                                            <div class="intro_subtitle">
                                                <p>Những tương tác tuyệt vời bắt đầu bằng việc hiểu rõ mong muốn và nhu cầu của khách hàng.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			</div>
<!-- <div class="conatiner-fluid p-4" style="background-color: whitesmoke;margin-top:150px;"> -->
 
	</div>
	<footer class="mt-5">
	<em><h5 class="text-light text-center p-0 brand mt-2">
				<img src="assets/images/airtic.png" 
					height="40px" width="40px" alt="">				
			Flight Booking</h5></em>
	<div class="text-light text-center">&copy; <?php echo date('Y')?> - Được phát triển bởi nhóm 7<br><br></div>
	<!-- <p>----------</p> -->
	
	</footer>	

    <?php subview('footer.php'); ?> 

		<script src="assets/js/easyResponsiveTabs.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('#horizontalTab').easyResponsiveTabs({
					type: 'default',         
					width: 'auto', 
					fit: true   
				});
			});		
		</script>
		<script>
		$('.value-plus').on('click', function(){
			var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
			divUpd.text(newVal);
			$('.input_val').val(newVal);
		});

		$('.value-minus').on('click', function(){
			var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
			if(newVal>=1) {
				divUpd.text(newVal);
				$('.input_val').val(newVal);
			} 
		});
		</script>
								<!--//quantity-->
						<!--load more-->
		<script>
	$(document).ready(function () {
		size_li = $("#myList li").size();
		x=1;
		$('#myList li:lt('+x+')').show();
		$('#loadMore').click(function () {
			x= (x+1 <= size_li) ? x+1 : size_li;
			$('#myList li:lt('+x+')').show();
		});
		$('#showLess').click(function () {
			x=(x-1<0) ? 1 : x-1;
			$('#myList li').not(':lt('+x+')').hide();
		});
	});
</script>
