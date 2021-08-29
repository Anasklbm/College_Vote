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
    $op=$_POST['op'];
    $np=$_POST['np'];
    $cp=$_POST['cp'];
    $opp=$_SESSION['pas'];
    if($op==$opp)
    {
        if($np==$cp)
        {
            $up=mysqli_query($dbcon,"update user_log set pas='$np' where uid='$em'");
            if($up>0)
            {
                header("location:changepas.php?suc=1");
            }
        }
        else{
            header("location:changepas.php?t=1");   
        }
    }
 else {
     
    header("location:changepas.php?t=2");    
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
                                                    <li class="active"><a href="staffhome.php">Home</a></li>							
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
                                                    <div class="col-lg-3"><center>
                                                        <img src="stud_pic/<?php echo $r_data[11] ?>" class="img img-responsive" />
                                                        <h4 style="background-color:  #1b6d85; color: white; padding: 5px; "><?php
                                                        echo strtoupper($r_data[2]);
                                                        ?></h4></center>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <form method="post">
                                                            <?php
                                                            if(isset($_GET['suc']))
                                                            {
                                                                ?>
                                                            <h3 style="text-align: center; margin-top: 50px;">Your Password Changed Successfully... <br />Click <a href="logout.php" style="background-color: red; color: white;">Here</a> to Re-login</h3>
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                            ?>
                                                        <table class="table table-bordered table-condensed">
                                                            <tr>
                                                                <td colspan="2"><center><b>This is your First Login to the portal, <br />Please change your password to secure Your Account.</b></center></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Current Password</td>
                                                                <td><input type="password" name="op" class="form-control" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>New Password</td>
                                                                <td><input type="password" name="np" class="form-control" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Confirm Password</td>
                                                                <td><input type="password" name="cp" class="form-control" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><center>
                                                                    <input type="submit" name="sub" value="CHANGE PASSWORD" class="btn btn-sm btn-danger" />
                                                            </center></td>
                                                            </tr>
                                                        </table>
                                                            <?php
                                                            }
                                                            ?>
                                                            <center>
                                                                <?php
                                                                if(isset($_GET['t']))
                                                                {
                                                                    $t=$_GET['t'];
                                                                    if($t=="1")
                                                                    {
                                                                        echo"Password Missmatch";
                                                                    }
                                                                    else{
                                                                        echo"Incorrect Old Pasword";
                                                                    }
                                                                }
                                                                ?>
                                                            </center>
                                                        </form>
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

