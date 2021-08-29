<?php
include 'connection.php';
ob_start();
$temp=null;
session_start();
if(isset($_SESSION['stud']))
{
$rn=$_SESSION['stud'];
$sel_data=mysqli_query($dbcon,"select * from cit_data where reg_num='$rn'");
$r_data=mysqli_fetch_row($sel_data);
}
else{
    header("location:index.php");
}
if(isset($_POST['sub'])){
    $rn=$_POST['rn'];
    $p=$_POST['p'];
    $em=$_POST['em'];
    $ad=$_POST['ad'];
    $up=$_FILES['up']['name'];
    $ext1=strrpos($up,".");
    $ext=  substr($up,$ext1);
    $nfn="$rn$ext";
    $up1=$_FILES['up1']['name'];
    $ex1=strrpos($up1,".");
    $ex=  substr($up1,$ex1);
    $nfn1="$rn$ex";
    $upld=mysqli_query($dbcon,"update cit_data set em='$em',pas='$p',adr='$ad',idcrd='$nfn',pic='$nfn1',st=1 where reg_num='$rn'");
    if($upld>0)
    {
        if(move_uploaded_file($_FILES['up']['tmp_name'],getcwd()."\\idcard\\$nfn"))
        {
         if(move_uploaded_file($_FILES['up1']['tmp_name'],getcwd()."\\stud_pic\\$nfn1"))
            {
                header("location:vote.php");
            }   
        }
    }
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
							<li><a href="index.php">Home</a></li>
							<li class="active"><a href="new_cntr.php">New Centre</a></li>
							<li><a href="vote.php">Vote Now</a></li>
                                                        <li><a href="results.php">Results</a></li>
							<li><a href="login.php">Login</a></li>							
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
                                                    <div class="col-lg-3"></div>
						<div class="col-lg-6">
							<h3>UPDATE YOUR PROFILE NOW</h3>
                                                        <div class="alert alert-info">
                                                           Hi <?php echo $r_data[2] ?>, Welcome to Our Election portal. for voting you have to update your profile. please fill below displayed form and press continue... 
                                                        </div>
                                                        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                                           
                                                            <tr>
                                                                <td>Register Number</td>
                                                                <td><input type="text" name="rn" value="<?php echo $rn ?>" readonly="readonly" class="form-control" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Password</td>
                                                                <td><input type="password" name="p" class="form-control" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email</td>
                                                                <td><input type="email" name="em" class="form-control" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Address</td>
                                                                <td><textarea name="ad" class="form-control"></textarea></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Upload ID Card</td>
                                                                <td><input type="file" name="up" class="form-control" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Upload Photo</td>
                                                                <td><input type="file" name="up1" class="form-control" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><center><input type="submit" name="sub" value="Continue" class="btn btn-success" /></center></td>
                                                            </tr>
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

