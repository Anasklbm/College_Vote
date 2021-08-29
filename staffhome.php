<?php
include './connection.php';
ob_start();
session_start();
if(isset($_SESSION['stf']))
{
    $em=$_SESSION['stf'];
    $sel_data=mysqli_query($dbcon,"select * from staf_data where stfif='$em'");
    $r_data=mysqli_fetch_row($sel_data);
    $colid=$r_data[3];
}
else{
    header("location:index.php");
}
if(isset($_POST['sub']))
{
    $d=$_POST['dep1'];
    $s=$_POST['sem'];
    header("location:staffhome.php?d=$d&s=$s");
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
                                <span style="float: right; color: blue;"><h4><?php echo $r_data[1] ?></h4></span>
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
							<li><a href="addstud.php">Add Students</a></li>                                                        
                                                        <li><a href="stf_result.php">Result</a></li>
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
                                                    <div class="col-lg-3">
                                                        <img src="staff_pic/<?php echo $r_data[8] ?>" class="img img-responsive" />
                                                        <h4 style="background-color:  #1b6d85; color: white; padding: 5px; margin-top: -2px;"><?php
                                                        echo strtoupper($r_data[1]);
                                                        ?></h4>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <h3>SEARCH STUDENT</h3>
                                                        <script>
                                                        function loadsem1(x)
                                                        {
                                                            var xmlhttp = new XMLHttpRequest();
                                                            xmlhttp.onreadystatechange = function() {
                                                              if (this.readyState == 4 && this.status == 200) {
                                                                document.getElementById("semm1").innerHTML = this.responseText;
                                                              }
                                                            };
                                                            xmlhttp.open("GET", "loadsem.php?q=" + x, true);
                                                            xmlhttp.send();
                                                        }
                                                        </script>
                                                        <table class="table table-bordered table-condensed table-hover">
                                                            <tr>
                                                                <td style="width: 50%"><select name="dep1" id="dep10" class="form-control" onchange="loadsem1(this.value)">
                                                                    <option value="0">Choose Department</option>
                                                                    <?php
                                                                    $sel_d=mysqli_query($dbcon,"select * from dep_data where col_id='$colid'");
                                                        while($r_dep=mysqli_fetch_row($sel_d))
                                                        {
                                                        ?>
                                                                    <option value="<?php echo $r_dep[0] ?>"><?php echo $r_dep[2] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                                </select></td>
                                                                <td>
                                                                    <span id="semm1">
                                                                <select name="sem" class="form-control">
                                                                </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <input type="submit" name="sub" value="search student" class="btn btn-sm btn-success" />
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <?php
                                                        if(isset($_GET['d']))
                                                        {
                                                            $d=$_GET['d'];
                                                            $s=$_GET['s'];
                                                            $selst=mysqli_query($dbcon,"select * from cit_data where dep='$d' and sem='$s' and col_id='$colid'");
                                                            if(mysqli_num_rows($selst)>0)
                                                            {
                                                                while($rst=mysqli_fetch_row($selst))
                                                                {
                                                                    ?>
                                                        <div class="col-lg-3">
                                                            <img src="stud_pic/<?php echo $rst[11] ?>" class="img img-responsive" /><br />
                                                            <b> <?php echo $rst[2] ?></b>
                                                        </div>
                                                        <?php
                                                                }
                                                            }
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

