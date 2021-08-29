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
if(isset($_POST['sub'])){
    $nme=$_POST['nme'];
    $rn=$_POST['rn'];
    $dep=$_GET['d'];
    $sem=$_GET['s'];
    $dob=$_POST['dob'];
    $sel=mysqli_query($dbcon,"select * from cit_data where reg_num='$rn'");
    if(mysqli_num_rows($sel)>0)
    {
        header("location:centerhome.php?success=0");
    }
    else{
    $ins_stdata=mysqli_query($dbcon,"insert into cit_data values ('','$colid','$nme','$rn','$dep','$sem','$dob','nil','nil','nil','nil','noimage.jpg','0')");
    if($ins_stdata>0){
        $inslog=mysqli_query($dbcon,"INSERT INTO `user_log`(`uid`, `pas`, `typ`, `st`) VALUES ('$rn','student','stud','1')");
        if($inslog>0)
        {
            header("location:addstud.php?d=$dep&s=$sem&success=1");
        }
    }
    }
}
if(isset($_POST['sub1']))
{
    $d=$_POST['dep'];
    $s=$_POST['sem'];
    header("location:addstud.php?d=$d&s=$s");
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
                                                    <li><a href="staffhome.php">Home</a></li>
							<li class="active"><a href="addstud.php">Add Students</a></li>                                                        
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
                                                    <div class="col-lg-6">
            <script type="text/javascript">
                
                function loadsem(x){
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                      if (xhttp.readyState == 4 && xhttp.status == 200) {
                       document.getElementById("semm").innerHTML = xhttp.responseText;
                      }
                    };
                    xhttp.open("GET", "loadsem.php?q="+x, true);
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
                                                    <h3>Update Students List</h3>
                                                    <?php
                                                    if(isset($_GET['d']))
                                                    {
                                                        ?>
                                                    <table class="table table-bordered table-condensed table-hover">
                                                        <tr>
                                                            <td colspan="2"><center><b>ENTER LIST HERE</b></center></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Name</td>
                                                            <td><input type="text" name="nme" id="nme" onblur="chkdata(this.id)" class="form-control" required="required"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Register number</td>
                                                            <td><input type="text" name="rn" id="rn" onblur="chkdata(this.id)" class="form-control" required="required" /></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td>Date of Birth</td>
                                                            <td><input type="date" name="dob" id="dob" class="form-control"  required="required"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><center><input type="submit" name="sub" value="ADD NOW" class="btn btn-success" />
                                                        <br />
                                                         <?php
                if(isset($_GET['success']))
                {
                    if($_GET['success']==1)
                    {
                        echo"<font color='green'>Student details added Successfully</font>";
                    }
                    else
                    {
                        echo"<font color='red'>Student Already Exist</font>";
                    }
                }
                ?>
                                                        </center></td>
                                                        </tr>
                                                    </table>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                    <table class="table table-bordered table-condensed table-hover">
                                                        <tr>
                                                            <td colspan="2"><center><b>Choose Here</b></center></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Department</td>
                                                            <td><select name="dep" class="form-control" onchange="loadsem(this.value)" required="required">
                                                                    <option value="">Choose</option>
                                                                    <?php
                                                                    $sel_d=mysqli_query($dbcon,"select * from dep_data where col_id='$colid'");
                                                        while($r_dep=mysqli_fetch_row($sel_d))
                                                        {
                                                        ?>
                                                                    <option value="<?php echo $r_dep[0] ?>"><?php echo $r_dep[2] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Semester</td>
                                                            <td><span id="semm">
                                                                <select name="sem" class="form-control">
                                                                </select>
                                                                    </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><center><input type="submit" name="sub1" value="ADD NOW" class="btn btn-success" />
                                                        </center>
                                                    </td>
                                                    </tr>
                                                    </table>
                                                    <?php
                                                    }                                                    
                                                    ?>
                                                    
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <?php
                                                        if(isset($_GET['d']))
                                                        {
                                                            $dep=$_GET['d'];
                                                            $sem=$_GET['s'];
                                                            $selst=mysqli_query($dbcon,"select * from cit_data where dep='$dep' and sem='$sem' and col_id='$colid'");
                                                            if(mysqli_num_rows($selst)>0)
                                                            {
                                                                ?>
                                                        <table class="table table-bordered table-responsive">
                                                            <tr>
                                                                <td colspan="5"><b>STUDENT LIST</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td>#</td>
                                                                <td>Student Name</td>
                                                                <td>Reg No</td>
                                                            </tr>
                                                            <?php
                                                            $i=0;
                                                            while($rst=mysqli_fetch_row($selst))
                                                            {
                                                                $i++;
                                                                ?>
                                                            <tr>
                                                                <td><?php echo $i ?></td>
                                                                <td><?php echo $rst[2] ?></td>
                                                                <td><?php echo $rst[3] ?></td>
                                                            </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </table>
                                                        <?php
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

