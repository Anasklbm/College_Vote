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
if(isset($_GET['did']))
{
    $cid=$_GET['did'];
    $del=mysqli_query($dbcon,"delete from cntr_info where em='$cid'");
    $del1=mysqli_query($dbcon,"delete from user_log where uid='$cid'");
    if($del1>0)
    {
        header("location:newcntrreq.php");
    }
}
if(isset($_GET['aid']))
{
    $cid=$_GET['aid'];
    $del=mysqli_query($dbcon,"update cntr_info set st='1' where em='$cid'");
    $del1=mysqli_query($dbcon,"update user_log set st='1' where uid='$cid'");
    if($del1>0)
    {
        header("location:newcntrreq.php");
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
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("dist").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "get_district.php?q=" + val, true);
    xmlhttp.send();
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
<script type="text/javascript">
            function chkdata(x)
            {
                var a=document.getElementById(x).value;
                if(a=="" || a==null){
                    document.getElementById(x).style.borderColor="red";
                    document.getElementById(x).focus();
                }
                else{
                    document.getElementById(x).style.borderColor="green";
                }
            }
            function chknum(e)
            {                
                var code=e.which || e.keyCode;
                
                if(code>=48 && code<=57){
                    return true;
                }
                else{
                    return false;
                }
            }
            function chkem(x){
                var a=document.getElementById(x).value;
                if(a=="" || a==null){
                    document.getElementById(x).style.borderColor="red";
                    document.getElementById(x).focus();
                }
                else{
                    atpos = a.indexOf("@");
                    dotpos = a.lastIndexOf(".");
         
                    if (atpos < 1 || ( dotpos - atpos < 2 )) 
                    {
                        document.getElementById(x).style.borderColor="red";
                    document.getElementById(x).focus();
                    }
                    else{
                        document.getElementById(x).style.borderColor="green";
                    }
                    }
                     
            }
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
                                                    <li class=""><a href="adminhome.php">Home</a></li>
							<li class=""><a href="addcntr.php">Add Center</a></li>
                                                        <li class="active"><a href="newcntrreq.php">New Center Request</a></li>
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
                                                    <h3>NEW CENTER REQUEST</h3>
                                                    <div class="col-lg-3"></div>
                                                    <div class="col-lg-6">
                                                        <?php
                                                        $selc=mysqli_query($dbcon,"select * from cntr_info where st='0'");
                                                        if(mysqli_num_rows($selc)>0)
                                                        {
                                                            ?>
                                                        <table class="table table-bordered table-condensed table-hover">
                                                            <tr>
                                                                <td>#</td>
                                                                <td>Center</td>
                                                                <td>Contact</td>
                                                                <td></td>
                                                            </tr>
                                                            <?php
                                                            $i=0;
                                                            while($rc=mysqli_fetch_row($selc))
                                                            {
                                                                $i++;
                                                                ?>
                                                            <tr>
                                                                <td><?php echo $i ?></td>
                                                                <td><?php echo $rc[1] ?></td>                                                                
                                                                <td><?php echo $rc[4] ?></td>
                                                                <td><a href="newcntrreq.php?aid=<?php echo $rc[2] ?>" class="label label-success">Approve</a>
                                                                    <a href="newcntrreq.php?did=<?php echo $rc[2] ?>" class="label label-danger pull-right">Delete</a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </table>
                                                        <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                        <h4>No Request Found</h4>
                                                        <?php
                                                        }
                                                        ?>
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
	</body>
</html>

