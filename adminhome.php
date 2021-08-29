<?php
include './connection.php';
ob_start();
session_start();
if(isset($_SESSION['admin']))
{
    
}
else{
    header("location:index.php");
}
if(isset($_GET['t'])){
    if($_GET['t']==1){
        $up=mysqli_query($dbcon,"update cntr_info set st=1 where em='".$_GET['bid']."'");
        if($up>0){
            $up1=mysqli_query($dbcon,"update user_log set st=1 where uid='".$_GET['bid']."'");
            if($up1>0){
                header("location:adminhome.php");
            }
        }
    }
    if($_GET['t']==2){
        $up=mysqli_query($dbcon,"update cntr_info set st=2 where em='".$_GET['bid']."'");
        if($up>0){
            $up1=mysqli_query($dbcon,"update user_log set st=2 where uid='".$_GET['bid']."'");
            if($up1>0){
                header("location:adminhome.php");
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
	</head>
	<body>
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
                                                    <li class="active"><a href="adminhome.php">Home</a></li>
							<li class=""><a href="addcntr.php">Add Center</a></li>
                                                        <li class=""><a href="newcntrreq.php">New Center Request</a></li>
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
                            <script type="text/javascript">
                                function shodata(x){
                                    $("#b"+x).toggle(1000);
                                }
                                </script>
					<div class="image-slider">
						<!-- Slideshow 1 -->
					    <ul class="rslides" id="slider1">
					      <li><img src="images/slide3.jpg" alt=""></li>
					      <li><img src="images/slide2.jpg" alt=""></li>
					      <li><img src="images/slide1.jpg" alt=""></li>
					    </ul>
						 <!-- Slideshow 2 -->
					</div>
					<!--End-image-slider---->
					<!---start-content---->
                                        <div class="content">
                                            <div class="row">
						<div class="col-lg-12">
                                                    <h3>REGISTERED CENTER DETAILS</h3>
                                                    <table class="table table-bordered table-condensed">
                                                        <tr>
                                                    <?php
                                                    $sel_cntr=mysqli_query($dbcon,"select * from cntr_info order by st asc");
                                                    $i=0;
                                                    $y=0;
                                                    while($r_cntr=mysqli_fetch_row($sel_cntr))
                                                    {
                                                        if($r_cntr[10]==0){
                                                            $color="red";
                                                        }
                                                        if($r_cntr[10]==1){
                                                            $color="green";
                                                        }
                                                        if($r_cntr[10]==2){
                                                            $color="orange";
                                                        }
                                                        ?>
                                                            <td style="width:50%;">
                                                                <table class="table table-bordered table-condensed">
                                                                    <tr>
                                                                        <td><center>
                                                                            <img id="<?php echo $y ?>" onclick="shodata(this.id)" src="c_pic/<?php echo $r_cntr[9] ?>" class="img img-thumbnail" style="width: 200px; height: 200px; border-color: <?php echo $color ?>;" />
                                                                            </center>
                                                                        </td>                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <span id="b<?php echo $y ?>" style="display: none">
                                                            <table class="table" style="white-space: nowrap">
                                                                <tr>
                                                                    <td>Contact Number</td>
                                                                    <td><?php echo $r_cntr[4] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Address</td>
                                                                    <td><?php echo $r_cntr[5] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <?php
                                                                        if($r_cntr[10]==0 || $r_cntr[10]==2){
                                                                        ?>
                                                                <center><a href="adminhome.php?t=1&bid=<?php echo $r_cntr[2] ?>"><span class="btn btn-sm btn-success">APPROVE</span></a></center>
                                                                <?php
                                                                        }
                                                                        ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                        if($r_cntr[10]==0 ||$r_cntr[10]==1){
                                                                        ?>
                                                            <center><a href="adminhome.php?t=2&bid=<?php echo $r_cntr[2] ?>"><span class="btn btn-sm btn-danger">DENY</span></a></center>
                                                            <?php
                                                                        }
                                                                        ?>
                                                            </td>
                                                                </tr>
                                                            </table>
                                                                            </span>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                    <?php
                                                    $i++;
                                                    if($i>1)
                                                    {
                                                        echo"</tr>";
                                                        $i=0;
                                                    }
                                                    $y++;
                                                    }
                                                    ?>
                                                        </tr>
                                                    </table>
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
	</body>
</html>

