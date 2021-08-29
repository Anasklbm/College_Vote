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
    $dn=$_POST['dn'];
    $ins_d=mysqli_query($dbcon,"insert into dep_data values('','$em','$dn','1')");
    if($ins_d>0){
        header("location:new_dep.php");
    }
}
if(isset($_POST['sub1']))
{
    $sem=$_POST['sem'];
    $ins_sem=mysqli_query($dbcon,"insert into sem_data values('','".$_GET['did']."','$em','$sem','1')");
    if($ins_sem>0){
        header("location:new_dep.php?t=1&did=".$_GET['did']);
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
                                                    <li class="active"><a href="new_dep.php">Manage Department</a></li>
                                                        <li><a href="addstaff.php">Add Staff</a></li>
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
					
					<!--End-image-slider---->
					<!---start-content---->
                                        <div class="content">
                                            <div class="row">
						<div class="col-lg-12">
                                                    <div class="col-lg-6">
                                                    <h3>DEPARTMENT</h3>
                                                      <form method="post" enctype="multipart/form-data">
                                                    <table class="table table-bordered table-condensed table-hover">
                                                        <tr>
                                                            <td colspan="2"><center><b>CREATE DEPARTMENT</b></center></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Department Name</td>
                                                            <td><input type="text" name="dn" id="dn" class="form-control" required="required" /></td>
                                                        </tr>                                                        
                                                        <tr>
                                                            <td colspan="2"><center><input type="submit" name="sub" value="ADD NOW" class="btn btn-success" /></center></td>
                                                        </tr>
                                                    </table>
                                                    <table class="table table-bordered table-condensed table-hover">
                                                        <tr>
                                                            <td colspan="3"><center><b>AVAILABLE DEPARTMENTS</b></center></td>
                                                        </tr>
                                                        <tr>
                                                            <td>#</td>
                                                            <td>Department Name</td>
                                                            <td>More</td>
                                                        </tr>
                                                        <?php
                                                        $i=1;
                                                        if(isset($_GET['del']))
                                                        {
                                                            $del=mysqli_query($dbcon,"delete from dep_data where id=".$_GET['did']);                                                            
                                                        }
                                                        $sel_d=mysqli_query($dbcon,"select * from dep_data where col_id='$em'");
                                                        while($r_dep=mysqli_fetch_row($sel_d))
                                                        {
                                                            ?>
                                                        <tr>
                                                            <td><?php echo $i ?></td>
                                                            <td><?php echo $r_dep[2] ?></td>
                                                            <td><a href="new_dep.php?del=1&did=<?php echo $r_dep[0] ?>"><img src="logo/closeIcon.jpg" width="20" height="20" /></a> <a href="new_dep.php?t=1&did=<?php echo $r_dep[0] ?>"><img src="logo/read.png" width="20" height="20" /></a></td>
                                                        </tr>
                                                        <?php
                                                        $i++;
                                                        }
                                                        ?>
                                                    </table>
                                                      </form>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <?php
                                                        if(isset($_GET['t']))
                                                        {
                                                            $sel_dn=mysqli_query($dbcon,"select * from dep_data where id='".$_GET['did']."' and col_id='$em'");
                                                            if(mysqli_num_rows($sel_dn)>0){
                                                                $r_dn=mysqli_fetch_row($sel_dn);
                                                            }
                                                            else{
                                                                header("location:new_dep.php");
                                                            }
                                                            ?>
                                                        <h3>SEMESTER</h3>
                                                          <form method="post" enctype="multipart/form-data">
                                                    <table class="table table-bordered table-condensed table-hover">
                                                        <tr>
                                                            <td colspan="2"><center><b>CREATE SEMESTER</b></center></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Department</td>
                                                            <td><input type="text" value="<?php echo $r_dn[2] ?>" class="form-control" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Semester</td>
                                                            <td><input type="text" name="sem" class="form-control" required="required" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><center><input type="submit" name="sub1" value="ADD SEMESTER" class="btn btn-success" /></center></td>
                                                        </tr>
                                                    </table>
                                                        <table class="table table-bordered table-condensed table-hover">
                                                        <tr>
                                                            <td colspan="2"><center><b>AVAILABLE SEMESTER :<font color="red"> <?php echo $r_dn[2] ?></font></b></center></td>
                                                        </tr>
                                                        <?php
                                                        $j=1;
                                                        $sel_sem=mysqli_query($dbcon,"select * from sem_data where did='".$_GET['did']."'");
                                                        while($r_sem=mysqli_fetch_row($sel_sem))
                                                        {
                                                            ?>
                                                        <tr>
                                                            <td><?php echo $j ?></td>
                                                            <td><?php echo $r_sem[3] ?></td>
                                                        </tr>
                                                        <?php
                                                        $j++;
                                                        }
                                                        ?>
                                                        </table>
                                                          </form>
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

