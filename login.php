<?php
include 'connection.php';
ob_start();
$temp=null;
if(isset($_POST['sub']))
{
    $em=$_POST['em'];
    $pw=$_POST['pw'];
    $sel_log=mysqli_query($dbcon,"select * from user_log where uid='$em' and pas='$pw'");
    if(mysqli_num_rows($sel_log)>0){
        session_start();
        $r_log=mysqli_fetch_row($sel_log);
        $typ=$r_log[3];
        if($typ=="admin"){
            $_SESSION['admin']=$em;
            header("location:adminhome.php");
        }
        if($typ=="cntr"){
            if($r_log[4]==1)
            {
            $_SESSION['cntr']=$em;
            header("location:centerhome.php");
            }
            
        }
        if($typ=="staf"){
            if($r_log[4]==1)
            {
            $_SESSION['stf']=$em;
            header("location:staffhome.php");
            }
            
        }
        if($typ=="stud"){
            if($r_log[4]==1)
            {
            $_SESSION['stud']=$em;
            if($pw=="student")
            {
                $_SESSION['pas']=$pw;
                header("location:changepas.php");
            }
            else
            {
                header("location:studenthome.php");
            }
            }
            
        }
    }
    else{
        $temp=1;
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
							<li><a href="new_cntr.php">New Centre</a></li>
							
							<li class="active"><a href="login.php">Login</a></li>							
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
						<div class="col-lg-7">
							<h3>USER LOGIN HERE</h3>
                                                        <table class="table table-bordered table-condensed table-hover table-responsive">
                                                            <tr>
                                                                <td>Email / Login ID</td>
                                                                <td><input type="text" name="em" class="form-control" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Password</td>
                                                                <td><input type="password" name="pw" class="form-control" /></td>
                                                            </tr>                                                            
                                                            <tr>
                                                                <td colspan="2"><center><input type="submit" name="sub" value="LogIn Now" class="btn btn-success" /></center></td>
                                                            </tr>
                                                        </table>
                                                        <center>
                                                            <?php
                                                            if(isset($temp)){
                                                                echo"<font color='red'><b>Invalid Log Information</b></font>";
                                                            }
                                                            ?>
                                                        </center>
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

