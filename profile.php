<?php
include './connection.php';
ob_start();
session_start();
if(isset($_SESSION['stud']))
{
    $em=$_SESSION['stud'];
    $sel_data=mysqli_query($dbcon,"select * from cit_data where reg_num='$em'");
    $r_data=mysqli_fetch_row($sel_data);
    $colid=$r_data[1];
}
else{
    header("location:index.php");
}
if(isset($_POST['sub']))
{
    $n=$_POST['nme'];
    $rn=$_POST['rn'];
    $dob=$_POST['dob'];
    $em=$_POST['em'];
    $addr=$_POST['addr'];
    $up1=$_FILES['up']['name'];
    $up=mysqli_query($dbcon,"update cit_data set nme='$n',dob='$dob',em='$em',adr='$addr',pic='$up1' where reg_num='$rn'");
    echo mysqli_error($dbcon);
    if($up>0)
    {
        if(move_uploaded_file($_FILES['up']['tmp_name'], getcwd()."\\stud_pic\\$up1"))
        {
            header("location:profile.php");
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
            <form method="post" enctype="multipart/form-data">
		<!---start-wrap---->
		
			<!---start-header---->
			<div class="header">
				<div class="wrap">
				<!---start-logo---->
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" title="logo" /></a>
                                        
				</div>
                                <span style="float: right; color: blue;"><h4><?php echo $r_data[2] ?></h4></span>
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
                                                    <li><a href="studenthome.php">Home</a></li>
                                                    <li class="active"><a href="profile.php">Profile</a></li>                                                        
                                                        <li><a href="election.php">Election</a></li>
                                                        <li><a href="stresult.php">Result</a></li>
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
                                                    <div class="col-lg-3"><center>
                                                        <img src="stud_pic/<?php echo $r_data[11] ?>" class="img img-responsive" />
                                                        <h4 style="background-color:  #1b6d85; color: white; padding: 5px; "><?php
                                                        echo strtoupper($r_data[2]);
                                                        ?></h4></center>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <?php
                                                        if($r_data[7]=="nil")
                                                        {
                                                        ?>
                                                        <form method="post" enctype="multipart/form-data">
                                                    <table class="table table-bordered table-condensed table-hover">
                                                        <tr>
                                                            <td colspan="2"><center><b>UPLOAD PROFILE</b></center></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Name</td>
                                                            <td><input type="text" value="<?php echo $r_data[2] ?>" name="nme" id="nme" onblur="chkdata(this.id)" class="form-control" required="required"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Register number</td>
                                                            <td><input type="text" name="rn" id="rn" value="<?php echo $r_data[3] ?>" readonly="" class="form-control" required="required" /></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td>Date of Birth</td>
                                                            <td><input type="date" name="dob" id="dob" class="form-control" value="<?php echo $r_data[6] ?>"  required="required"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email</td>
                                                            <td><input type="email"  name="em" id="em"  class="form-control" required="required"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Address</td>
                                                            <td><textarea name="addr" class="form-control" required="required"></textarea></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Photo</td>
                                                            <td><input type="file"  name="up" class="form-control" required="required"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><center><input type="submit" name="sub" value="UPDATE DATA" class="btn btn-success" />
                                                        </center>
                                                        </td>
                                                        </tr>
                                                    </table>
                                                        </form>
                                                        <?php
                                                        }
                                                        else{
                                                            ?>
                                                        <center><a href="profile.php"><img src="images/profile.png" /></a></center>
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
                        </form>
	</body>
</html>

