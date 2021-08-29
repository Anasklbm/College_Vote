<?php
include './connection.php';
ob_start();
session_start();
if(isset($_SESSION['cntr']))
{
    $em=$_SESSION['cntr'];
    $sel_data=mysqli_query($dbcon,"select * from cntr_info where em='$em'");
    $r_data=mysqli_fetch_row($sel_data);
}
else{
    header("location:index.php");
}
if(isset($_POST['sub']))
{
    $sn=$_POST['sn'];
    $sid=$_POST['sid'];
    $pas=$_POST['pas'];
    $desig="3";
    $adr=$_POST['adr'];
    $con=$_POST['con'];
    $em1=$_POST['em'];
    $qua=$_POST['qua'];
    $up=$_FILES['up']['name'];
    $nfn=$sid."".substr($up,strrpos($up,"."));
    $dt=$_POST['dt'];
    $ins_stf=mysqli_query($dbcon,"INSERT INTO `staf_data`(`stfid`, `nme`, `stfif`, `colid`, `adr`, `con`, `em`, `qual`, `pic`, `dob`, `st`) VALUES ('','$sn','$sid','$em','$adr','$con','$em1','$qua','$nfn','$dt','1')");
    if($ins_stf>0)
    {
        if(move_uploaded_file($_FILES['up']['tmp_name'], getcwd()."\\staff_pic\\$nfn"))
        {
            $ins_log=mysqli_query($dbcon,"INSERT INTO `user_log`(`uid`, `pas`, `typ`, `st`) VALUES ('$sid','$pas','staf','1')");
            header("location:addstaff.php");
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
              <script type="text/javascript">
    function nme(b2)
{
var k5=b2.length;
var ch2=/([a-z])$/;
if(ch2.test(b2)==false)
{
document.getElementById("np3").innerHTML="<font color='red'>*Only Alphabets*</font>";
$("#btn").hide();
return false;
}

else
{
  document.getElementById("np3").innerHTML="";  
  $("#btn").show();
}
}
  
  
  
    
    function chkc(b2)
{
var k5=b2.length;
var ch2=/([0-9])$/;
if(ch2.test(b2)==false)
{
document.getElementById("o3").innerHTML="<font color='red'>*Only Numbers*</font>";
$("#btn").hide();
return false;
}
else if(k5!=10)
{
document.getElementById("o3").innerHTML="<font color='red'>*Please Check Your Mobile Number*</font>";
$("#btn").hide();
return false;
}
else
{
  document.getElementById("o3").innerHTML="";  
  $("#btn").show();
}
}
  
 function chkp(c)
{
var s=document.getElementById("p10").value;

if(s==c)
{
document.getElementById("p").innerHTML="<font color='Green'>*Password is Correct*</font>";
$("#btn").show();
return false;
}
else
{
document.getElementById("p").innerHTML="<font color='red'>*Verfy Password*</font>";
$("#btn").hide();
}
}





function vem(a)  
     {  
          //var a = document.myform.email.value;  
          var atposition = a.indexOf("@");  
          var dotposition = a.lastIndexOf(".");  
          if (atposition<1 || dotposition<atposition+2 || dotposition+2>=a.length) 
          {  
               document.getElementById("em").innerHTML="<font color='red'>*Please Check Your Email Address*</font>";
                $("#btn").hide();  
          }  
          else
{
                document.getElementById("em").innerHTML="";  
  $("#btn").show();
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
                                                    <li class=""><a href="centerhome.php">Home</a></li>
							<li><a href="new_dep.php">Manage Department</a></li>
                                                        <li class="active"><a href="addstaff.php">Add Staff</a></li>
							<li><a href="new_elec.php">Manage Election</a></li>
                                                        <li><a href="new_candidate.php">Candidate</a></li>
                                                        <li><a href="pub_result.php">Result</a></li>
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
                                                    <div class="col-lg-6">
            <script type="text/javascript">
                function loadsem(x){
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                      if (xhttp.readyState == 4 && xhttp.status == 200) {
                       document.getElementById("semm").innerHTML = xhttp.responseText;
                      }
                    };
                    xhttp.open("GET", "loadsem.php?d="+x, true);
                    xhttp.send();
                }
                function loadsem1(x){
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                      if (xhttp.readyState == 4 && xhttp.status == 200) {
                       document.getElementById("semm1").innerHTML = xhttp.responseText;
                      }
                    };
                    xhttp.open("GET", "loadsem1.php?d="+x, true);
                    xhttp.send();
                }
                function loadstud(sem)
                {
                    var dep=document.getElementById("dep10").value;
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                      if (xhttp.readyState == 4 && xhttp.status == 200) {
                       document.getElementById("slist").innerHTML = xhttp.responseText;
                      }
                    };
                    xhttp.open("GET", "loadstud.php?d="+dep+"&s="+sem, true);
                    xhttp.send();
                }
            </script>
                                                    <h3>ADD STAFF</h3>
                                                    <form method="post">
                                                        <table class="table table-bordered table-condensed table-responsive table-striped">
                                                                <tr>
                                                                    <td colspan="2"><center><b>Fill the Below Form</b></center></td>
                                                                </tr>                                                                
                                                                
                                                                <tr>
                                                                    <td>Staff Name</td>
                                                                    <td><input type="text" name="sn" class="form-control" required="required" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Staff ID</td>
                                                                    <td><input type="text" name="sid" class="form-control" required="required" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Password</td>
                                                                    <td><input type="password" name="pas" class="form-control" required="required" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Address</td>
                                                                    <td><textarea name="adr" class="form-control"></textarea></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Contact Number</td>
                                                                    <td><input type="text" name="con" class="form-control" required="required"  onkeyup="chkc(this.value)" /><span id="o3"></span> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Email</td>
                                                                    <td><input type="email" name="em" class="form-control" required="required" onkeyup="vem(this.value)" /><span id="em"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Qualification</td>
                                                                    <td><input type="text" name="qua" class="form-control" required="required" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Image</td>
                                                                    <td><input type="file" name="up" class="form-control" required="required" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Date of Birth</td>
                                                                    <td><input type="date" name="dt" class="form-control" required="required" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2"><center><input type="submit" name="sub" value="ADD STAFF" class="btn btn-sm btn-danger" /></center></td>
                                                                </tr>
                                                            </table>
                                                            </form>                                                    
                                                    </div>
                                                    <div class="col-lg-6">
                                                    
                                                            <?php
                                                            $sel_r=mysqli_query($dbcon,"select * from staf_data where colid='$em'");
                                                            if(mysqli_num_rows($sel_r)>0)
                                                            {
                                                                ?>
                                                            <table class="table table-bordered table-condensed table-hover table-striped">
                                                                <tr>
                                                                    <td colspan="6"><center><b>AVAILABLE STAFF DETAILS</b></center></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>#</td>
                                                                    <td>Staff Name</td>
                                                                    <td>User ID</td>
                                                                    <td>Contact Number</td>                                                                    
                                                                    <td></td>
                                                                </tr>
                                                                <?php
                                                                $i=0;
                                                                while($rr=mysqli_fetch_row($sel_r))
                                                                {
                                                                    $i++;
                                                                    ?>
                                                                <tr>
                                                                    <td><?php echo $i ?></td>
                                                                    <td><?php echo $rr[1] ?></td>
                                                                    <td><?php echo $rr[2] ?></td>
                                                                    <td><?php echo $rr[5] ?></td>                                                                    
                                                                    
                                                                </tr>
                                                                <?php
                                                                }
                                                                ?>
                                                            </table>
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

