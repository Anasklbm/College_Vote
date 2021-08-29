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
$colid=$col;
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
                                                    <li><a href="results.php">Home</a></li>
                                                        <li><a href="logout.php">Logout</a></li>							
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
						<div class="col-lg-9">
							<h3>FIND RESULT HERE</h3>
                                                        <?php
                                                        $selx=mysqli_query($dbcon,"select * from eletype where colid='$colid'");
                                                        if(mysqli_num_rows($selx)>0)
                                                        {
                                                            $h=0;
                                                         while($rx=mysqli_fetch_row($selx))
                                                         {
                                                             $h++;
                                                             ?>
                                                        <table class="table table-bordered table-condensed table-hover">
                                                            <tr>
                                                                <td colspan="3"><center><b><font color="green"><?php echo $rx[1] ?></font></b></center></td>
                                                            </tr>                                                           
                                                            <tr><td>  
                                                                    
                                                            <?php   
                                                            $sel_cid=mysqli_query($dbcon,"select * from candidate_data where eid='".$_GET['eid']."' and el_for='$rx[0]'");
                                                            $i=0;
                                                            $max=0;
                                                            $usr="";
                                                            $test="";
                                                            if(mysqli_num_rows($sel_cid)>0)
                                                            {
                                                            while($r_cid=mysqli_fetch_row($sel_cid))
                                                            {
                                                                ?><div class="col-lg-4">
                                                                <center>
                                                                                <?php                                                                                
                                                                                $sel_usr=mysqli_query($dbcon,"select * from cit_data where reg_num='$r_cid[8]'");
                                                                                $r_usr=mysqli_fetch_row($sel_usr);
                                                                                if($r_cid[9]>$max)
                                                                                {
                                                                                    $max=$r_cid[9];
                                                                                    $usr=$r_usr[2];
                                                                                    $test=1;
                                                                                }
                                                                                else if($r_cid[9]==$max)
                                                                                {
                                                                                    $usr.=",".$r_usr[2];
                                                                                    $test=2;
                                                                                    
                                                                                }
                                                                                ?>
                                                                                <img src="stud_pic/<?php echo $r_usr[11] ?>" width="125" height="130" /><br />
                                                                                <?php echo $r_usr[2] ?><br />(<?php echo $r_cid[8] ?>)<br />
                                                                                Total Vote : <?php echo $r_cid[9] ?>
                                                                        </center>
                                                                    </div>
                                                               <?php
                                                            }
                                                               $i++;
                                                               if($i>2)
                                                               {
                                                                   
                                                                   $i=0;
                                                               }
                                                            
                                                            ?>
                                                                        </center>
                                                        
                                                              </tr>
                                                              <tr>
                                                                  <td colspan="3">
                                                                      <?php
                                                                      if($test==1)
                                                                      {
                                                                          $msg="Win the First Place";
                                                                      }
                                                                      if($test==2)
                                                                      {
                                                                          $msg="Share the First Place";
                                                                      }
                                                                      ?><h4 align="center">
                                                                      <?php echo "<font color='red'>$usr</font> $msg" ?></h4></td>
                                                              </tr>
                                                                    <?php
                                                            }
                                                            else
                                                            {
                                                                echo"No data";
                                                            }
                                                            
                                                            ?>
                                                        </table>
                                                        <?php
                                                        }
                                                         
                                                        }
                                                        ?>
                                                        
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

