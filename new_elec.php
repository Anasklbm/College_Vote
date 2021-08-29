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
    $etyp=$_POST['etyp'];
    $ins_d=mysqli_query($dbcon,"insert into ele_cat values('','$em','$etyp','1')");
    if($ins_d>0){
        header("location:new_elec.php");
    }
}
if(isset($_POST['sub1']))
{
    $pty=$_POST['pty'];
    $ins_sem=mysqli_query($dbcon,"insert into party_data values('','".$_GET['eid']."','$em','$pty','1')");
    if($ins_sem>0){
        header("location:new_elec.php?t=1&eid=".$_GET['eid']);
    }
    
}
if(isset($_POST['sub2']))
{
    $etle=$_POST['etle'];
    $dep1=$_POST['dep1'];
    $etyp=$_POST['etyp'];
    $ndt=$_POST['ndt'];
    $ed=$_POST['ed'];
    $tim1=$_POST['tim1'];
    $tim2=$_POST['tim2'];
    $ins_ecat=mysqli_query($dbcon,"insert into manage_ele values('','$em','$etle','$dep1','$etyp','$ndt','$ed','$tim1','$tim2','1')");
    if($ins_ecat>0){
         header("location:new_elec.php");
    }
}
if(isset($_POST['sub10']))
{
    $et10=$_POST['et10'];
    $ins10=mysqli_query($dbcon,"INSERT INTO `eletype`(`etyp`, `colid`, `st`) VALUES ('$et10','$em','1')");
    if($ins10>0)
    {
        header("location:new_elec.php");
    }
}
if(isset($_GET['deltyp']))
{
    $deltyp=$_GET['deltyp'];
    $del=mysqli_query($dbcon,"delete from eletype where id='$deltyp'");
    if($del>0)
    {
        header("location:new_elec.php");
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
                                                    <li><a href="centerhome.php">Home</a></li>
							<li><a href="new_dep.php">Manage Department</a></li>
                                                        <li><a href="addstaff.php">Add Staff</a></li>
							<li class="active"><a href="new_elec.php">Manage Election</a></li>
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
                                                    <h3>ELECTION CATEGORY</h3>
                                                    <form method="post" enctype="multipart/form-data">
                                                    <table class="table table-bordered table-condensed table-hover">
                                                        <tr>
                                                            <td colspan="2"><center><b>CREATE ELECTION CATEGORY</b></center></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Election Type</td>
                                                            <td><input type="text" name="etyp" id="etyp" class="form-control" required="required" /></td>
                                                        </tr>                                                        
                                                        <tr>
                                                            <td colspan="2"><center><input type="submit" name="sub" value="ADD NOW" class="btn btn-success" /></center></td>
                                                        </tr>
                                                    </table>
                                                    </form>
                                                    <table class="table table-bordered table-condensed table-hover">
                                                        <tr>
                                                            <td colspan="3"><center><b>AVAILABLE ELECTION CATEGORY</b></center></td>
                                                        </tr>
                                                        <tr>
                                                            <td>#</td>
                                                            <td>Category</td>
                                                            <td>More</td>
                                                        </tr>
                                                        <?php
                                                        $i=1;
                                                        $sel_et=mysqli_query($dbcon,"select * from ele_cat where col_id='$em'");
                                                        while($r_et=mysqli_fetch_row($sel_et))
                                                        {
                                                            ?>
                                                        <tr>
                                                            <td><?php echo $i ?></td>
                                                            <td><?php echo $r_et[2] ?></td>
                                                            <td><a href="new_elec.php?t=2&eid=<?php echo $r_et[0] ?>"><img src="logo/read.png" width="20" height="20" /></a> <a href="new_elec.php?t=1&eid=<?php echo $r_et[0] ?>"><img src="logo/plus.png" width="20" height="20" /></a></td>
                                                        </tr>
                                                        <?php
                                                        $i++;
                                                        }
                                                        ?>
                                                    </table>
                                                    <?php
                                                    if(isset($_GET['t']))
                                                    {
                                                        $sel_etn=mysqli_query($dbcon,"select * from ele_cat where id='".$_GET['eid']."' and col_id='$em'");
                                                           if(mysqli_num_rows($sel_etn)>0){
                                                               $r_etn=mysqli_fetch_row($sel_etn);
                                                           }
                                                           else{
                                                               header("location:new_elec.php");
                                                           }
                                                        if($_GET['t']==1)
                                                        {
                                                        ?>
                                                    <form method="post" enctype="multipart/form-data">
                                                    <table class="table table-bordered table-condensed table-hover">
                                                        <tr>
                                                            <td colspan="2"><center><b>ADD SUB CATEGORY / PARTY</b></center></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Election Type</td>
                                                            <td><input type="text" readonly="readonly" value="<?php echo $r_etn[2] ?>" class="form-control" required="required" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Category / Party</td>
                                                            <td><input type="text" name="pty" class="form-control" required="required" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><center><input type="submit" name="sub1" value="ADD NOW" class="btn btn-success" /></center></td>
                                                        </tr>
                                                    </table>
                                                    </form>
                                                    <?php
                                                        }
                                                        ?>
                                                    <table class="table table-bordered table-condensed table-hover">
                                                        <tr>
                                                            <td colspan="2"><center><b>AVAILABLE SEMESTER :<font color="red"> <?php echo $r_etn[2] ?></font></b></center></td>
                                                        </tr>
                                                        <?php
                                                        $j=1;
                                                        $sel_sem=mysqli_query($dbcon,"select * from party_data where ecat='".$_GET['eid']."'");
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
                                                    <?php
                                                    }
                                                    ?>
                                                    <h3>MANAGE ELECTION TYPE</h3>
                                                    <form method="post" enctype="multipart/form-data">
                                                    <table class="table table-bordered table-condensed table-hover">
                                                        <tr>
                                                            <td colspan="2"><center><b>CREATE ELECTION CATEGORY</b></center></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Election Type</td>
                                                            <td><input type="text" name="et10" id="etyp10" class="form-control" required="required" /></td>
                                                        </tr>                                                        
                                                        <tr>
                                                            <td colspan="2"><center><input type="submit" name="sub10" value="ADD NOW" class="btn btn-success" /></center></td>
                                                        </tr>
                                                    </table>
                                                        <?php
                                                        $selet10=mysqli_query($dbcon,"select * from eletype where colid='$em'");
                                                        if(mysqli_num_rows($selet10)>0)
                                                        {
                                                            ?>
                                                        <table class="table table-bordered table-condensed table-hover">
                                                            <tr>
                                                                <td>#</td>
                                                                <td>Election Type</td>
                                                                <td></td>
                                                            </tr>
                                                            <?php
                                                            $i=0;
                                                            while($reel=mysqli_fetch_row($selet10))
                                                            {
                                                                $i++;
                                                                ?>
                                                            <tr>
                                                                <td><?php echo $i ?></td>
                                                                <td><?php echo $reel[1] ?></td>
                                                                <td><a href="new_elec.php?deltyp=<?php echo $reel[0] ?>" class="label label-danger">Delete</a></td>
                                                            </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </table>
                                                        <?php
                                                        }
                                                        ?>
                                                    </form>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h3>MANAGE ELECTION</h3>
                                                      <form method="post" enctype="multipart/form-data">  
                                                    <table class="table table-bordered table-condensed table-hover">
                                                        <tr>
                                                            <td colspan="2"><center><b>CREATE ELECTION</b></center></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Election Title</td>
                                                            <td><input type="text" name="etle" id="etle" onblur="chkdata(this.id)" class="form-control" required="required" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Department</td>
                                                            <td><select name="dep1" class="form-control">
                                                                    <option value="0">All Department</option>
                                                                    <?php
                                                                    $sel_d=mysqli_query($dbcon,"select * from dep_data where col_id='$em'");
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
                                                            <td>Election Type</td>
                                                            <td>
                                                                <select name="etyp" class="form-control">                                                                    
                                                                    <?php
                                                                    $sel_ecat=mysqli_query($dbcon,"select * from ele_cat where col_id='$em'");
                                                        while($r_ecat=mysqli_fetch_row($sel_ecat))
                                                        {
                                                        ?>
                                                                    <option value="<?php echo $r_ecat[0] ?>"><?php echo $r_ecat[2] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                                </select>                                                                
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nomination End date</td>
                                                            <td><input type="date" name="ndt" id="ndt" class="form-control" required="required" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Election Date</td>
                                                            <td><input type="date" name="ed" id="ed" class="form-control" required="required" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Start Time</td>
                                                            <td><input type="time" name="tim1" id="tim1" class="form-control" required="required" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>End Time</td>
                                                            <td><input type="time" name="tim2" id="tim2" class="form-control" required="required" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><center><input type="submit" name="sub2" value="ADD ELECTION" class="btn btn-success" /></center></td>
                                                        </tr>
                                                    </table>
                                                      </form>
                                                        <h3>AVILABLE ELECTION</h3>
                                                        <table class="table table-bordered table-condensed table-hover">
                                                        <tr>
                                                            <td colspan="3"><center><b>AVAILABLE ELECTION</b></center></td>
                                                        </tr>
                                                        <tr>
                                                            <td>#</td>
                                                            <td>Election Title</td>
                                                            <td>Date</td>
                                                        </tr>
                                                        <?php
                                                        $i=1;
                                                        $sel_ele=mysqli_query($dbcon,"select * from manage_ele where col_id='$em' and st=1");
                                                        while($r_ele=mysqli_fetch_row($sel_ele))
                                                        {
                                                            ?>
                                                        <tr>
                                                            <td><?php echo $i ?></td>
                                                            <td><?php echo $r_ele[2] ?></td>
                                                            <td><?php echo date("d M Y (D)", strtotime($r_ele[5])); ?></td>
                                                        </tr>
                                                        <?php
                                                        $i++;
                                                        }
                                                        ?>
                                                    </table>
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

