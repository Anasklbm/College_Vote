<?php
include 'connection.php';
ob_start();
session_start();
if(isset($_SESSION['stud']))
{
$rn=$_SESSION['stud'];
$sel_data=mysqli_query($dbcon,"select * from cit_data where reg_num='$rn'");
$r_data=mysqli_fetch_row($sel_data);
$col=$r_data[1];
$dep=$r_data[4];
$sem=$r_data[5];
}
else{
    header("location:index.php");
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Voting</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
                <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"  media="all" />
                <link href="css/bootstrap.css" rel="stylesheet" type="text/css"  media="all" />
                <link href="css/font-awesome.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="legend iphone web template, Andriod web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		
		<link rel="stylesheet" href="css/responsiveslides.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		  <script>
		    // You can also use "$(window).load(function() {"
			    $(function () {
			
			      // Slideshow 1
			      $("#slider1").responsiveSlides({
			        maxwidth: 1600,
			        speed: 600
			      });
			});
		  </script>
                  <script>
function getdistrict(val) {
	$.ajax({
	type: "POST",
	url: "get_district.php",
	data:'state_id='+val,
	success: function(data){
		$("#district-list").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>	 
	</head>
	<body>
            <form method="post" enctype="multipart/form-data">
		<!---start-wrap---->
		
			<!---start-header---->
			<div class="header">
				<div class="wrap">
				<!---start-logo---->
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" title="logo" /></a>
				</div>
				<!---end-logo---->
				<!---start-search---->
				<div class="top-search-bar">
					
				</div>
				<div class="clear"> </div>
				</div>
			</div>
				<div class="clear"> </div>
				<div class="header-nav">
					<div class="wrap">
					<div class="left-nav">
						<ul>
                                                        <li><a href="staffhome.php">Home</a></li>
							<li><a href="profile.php">Profile</a></li>                                                        
                                                        <li><a href="election.php">Election</a></li>
                                                        <li><a href="stresult.php">Result</a></li>
                                                        <li class="active"><a href="votenow.php">Vote Now</a></li>
							<li><a href="logout.php">logout</a></li>						
						</ul>
					</div>
					
					<div class="clear"> </div>
				</div>
				<!---start-search---->
			</div>
			<!---end-header---->
			<!--start-image-slider---->
			<div class="wrap">
					
					<!--End-image-slider---->
					<!---start-content---->
                                        <div class="content">
                                            <div class="row">
						<div class="col-lg-12">
                                                    <div class="col-lg-3">
                                                        <table class="table table-bordered table-condensed table-hover">
                                                            <tr>
                                                                <td><center><img src="stud_pic/<?php echo $r_data[11] ?>" width="140" height="150" /><br />
                                                            <?php echo $r_data[2] ?>
                                                            </center></td>
                                                            </tr>
                                                            
                                                        </table>
                                                    </div>
						<div class="col-lg-6">
							<h3>AVAILABLE VOTE FOR YOU</h3>
                                                        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                                            <tr>
                                                                <td>#</td>
                                                                <td>Election ID</td>
                                                                <td>Date of Election</td>
                                                                <td>More</td>
                                                             </tr>
                                                             <?php
                                                             $i=1;
                                                             $dt=date('Y-m-d');
                                                             $sel_ele=mysqli_query($dbcon,"select * from manage_ele where col_id='$col' and dt='$dt' and (dep='$dep' or dep=0)");
                                                             while($r_ele=mysqli_fetch_row($sel_ele))
                                                             {
                                                                 ?>
                                                             <tr>
                                                                 <td><?php echo $i ?></td>
                                                                 <td><?php echo $r_ele[2] ?></td>
                                                                 <td><?php echo date("d M Y (D)", strtotime($r_ele[5])); ?></td>
                                                                 <td><a href="votenow1.php?eid=<?php echo $r_ele[0] ?>">Click To Vote</a></td>
                                                             </tr>
                                                             <?php
                                                             $i++;
                                                             }
                                                             ?>
                                                        </table>
						</div>
						
						<div class="col-lg-5">
                                                    
						</div>
						
					</div>
					
				</div>
					<!---End-content---->
					<div class="clear"> </div>
                                        </div>
				</div>
					<div class="footer"> 
						<div class="wrap"> 
						
						<div class="footer-right">
							<p>Voting &#169 All Rights Reserved | Design By <a href="#">Trinity Technologies</a></p>
						</div>
						<div class="clear"> </div>
					</div>
					<div class="clear"> </div>
		<!---end-wrap---->
		</div>
                        </form>
	</body>
</html>

