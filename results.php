<?php
include 'connection.php';
ob_start();
$temp=null;
if(isset($_POST['sub'])){
    $cid=$_POST['cid'];
    $rn=$_POST['rn'];
    $dob=$_POST['dt'];
    $sel_data=mysqli_query($dbcon,"select * from cit_data where col_id='$cid' and reg_num='$rn' and dob='$dob'");
    if(mysqli_num_rows($sel_data)>0){
        session_start();
        $_SESSION['stud']=$rn;
        $r_data=mysqli_fetch_row($sel_data);
        $st=$r_data[12];
        if($st==0){
            header("location:up_pro.php");
        }
        else
        {
            header("location:rsltnow.php");
        }
        echo $st;
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
							<li><a href="profile.php">Profile</a></li>                                                        
                                                        <li><a href="election.php">Election</a></li>
                                                        <li class="active"><a href="stresult.php">Result</a></li>
                                                        <li><a href="votenow.php">Vote Now</a></li>
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
                                                    <div class="col-lg-3"></div>
						<div class="col-lg-6">
							<h3>LOGIN TO VOTE</h3>
                                                        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                                            <tr>
                                                                <td>Choose College</td>
                                                                        <td><select name="cid" class="form-control">
                                                                                <option>Choose</option>
                                                                                <?php
                                                                                $sel_col=mysqli_query($dbcon,"select * from cntr_info");
                                                                                while($r_col=mysqli_fetch_row($sel_col))
                                                                                {
                                                                                    ?>
                                                                                <option value="<?php echo $r_col[2] ?>"><?php echo $r_col[1] ?></option>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                    </select></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Register Number</td>
                                                                <td><input type="text" name="rn" class="form-control" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Date of Birth</td>
                                                                <td><input type="date" name="dt" class="form-control" /></td>
                                                            </tr>
                                                            \<tr>
                                                                <td colspan="2"><center><input type="submit" name="sub" value="Proceed" class="btn btn-success" /></center></td>
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

