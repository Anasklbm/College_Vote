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
if(isset($_POST['sub'])){
    $eid=$_GET['eid'];
    $etp=$_POST['etp'];
    $prty=$_POST['prty'];
    $ef=$_POST['ef'];
    $dep=$_POST['dep'];
    $sem=$_POST['sem']; 
    $cid=$_POST['cid'];
    $ins_cand=mysqli_query($dbcon,"insert into candidate_data values('','$em','$eid','$dep','$sem','$ef','$etp','$prty','$cid','0','1')");
    if($ins_cand>0){
        header("location:new_candidate.php?x=1&t=1&eid=".$_GET['eid']);
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
                                                    <li><a href="centerhome.php">Home</a></li>
							<li><a href="new_dep.php">Manage Department</a></li>
                                                        <li><a href="addstaff.php">Add Staff</a></li>
							<li><a href="new_elec.php">Manage Election</a></li>
                                                        <li class="active"><a href="new_candidate.php">Candidate</a></li>
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
                                                    <h3>ASSIGN CANDIDATE</h3>
                                                    <table class="table table-bordered table-condensed table-hover">
                                                        <tr>
                                                            <td colspan="4"><center><b>CHOOSE ELECTION HERE</b></center></td>
                                                        </tr>
                                                        <tr>
                                                            <td>#</td>
                                                            <td>Election Title</td>
                                                            <td>Date</td>
                                                            <td>More</td>
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
                                                            <td><a href="new_candidate.php?x=1&t=1&eid=<?php echo $r_ele[0] ?>"><img src="logo/plus.png" /></a>
                                                                <a href="new_candidate.php?x=1&eid=<?php echo $r_ele[0] ?>"><img src="logo/view-icon.png" /></a>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $i++;
                                                        }
                                                        ?>
                                                    </table>
                                                    <?php
                                                    if(isset($_GET['t']))
                                                    {
                                                        $sel_e=mysqli_query($dbcon,"select * from manage_ele where id='".$_GET['eid']."' and col_id='$em'");
                                                        if(mysqli_num_rows($sel_e)>0)
                                                        {
                                                         $r_e=mysqli_fetch_row($sel_e);   
                                                        }
                                                        else{
                                                            header("location:new_candidate.php");
                                                        }
                                                    ?>
                                                    <script type="text/javascript">
                                                    
                                                    function loadstid(x)
                                                    {
                                                        document.getElementById("cid").value=x;
                                                        $("#slist").hide();
                                                    }
                                                    </script>
                                                    <script type="text/javascript">
                                                        function loadsem(x){
                                                            var xhttp = new XMLHttpRequest();
                                                            xhttp.onreadystatechange = function() {
                                                              if (xhttp.readyState == 4 && xhttp.status == 200) {
                                                               document.getElementById("semm").innerHTML = xhttp.responseText;
                                                              }
                                                            };
                                                            xhttp.open("GET", "loadsem1.php?d="+x, true);
                                                            xhttp.send();
                                                        }
                                                        function loadstud(sem)
                                                        {                                                          
                                                            //$("#slist").show();
                                                           
                                                            var dep=document.getElementById("dep10").value;
                                                            var xhttp = new XMLHttpRequest();
                                                            xhttp.onreadystatechange = function() {
                                                              if (xhttp.readyState == 4 && xhttp.status == 200) {
                                                               document.getElementById("slist").innerHTML = xhttp.responseText;
                                                              }
                                                            };
                                                            xhttp.open("GET", "loadstud1.php?d="+dep+"&s="+sem, true);
                                                            xhttp.send();
                                                        }
                                                    </script>
                                                    <table class="table table-bordered table-condensed table-hover">
                                                        <tr>
                                                            <td colspan="2"><center><b>ASSIGN CANDIDATE</b></center></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Election Title</td>
                                                            <td><input type="text" name="et" id="et" class="form-control" readonly="readonly" value="<?php echo $r_e[2] ?>" /></td>
                                                        </tr>                                                         
                                                        <tr>
                                                            <td>Election Type</td>
                                                            <td>
                                                                <?php
                                                                $stl_typ=mysqli_query($dbcon,"select * from ele_cat where id='$r_e[4]' and col_id='$em'");
                                                                $r_typ=mysqli_fetch_row($stl_typ);
                                                                ?>
                                                                <input type="text" name="etp" id="etp" class="form-control" readonly="readonly" value="<?php echo $r_typ[2] ?>" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Choose Party/Sub-category</td>
                                                            <td>
                                                                <select name="prty" class="form-control">
                                                                    <?php
                                                                    $sel_pt=mysqli_query($dbcon,"select * from party_data where ecat='$r_e[4]'");
                                                                    while($r_pt=  mysqli_fetch_row($sel_pt))
                                                                    {
                                                                        ?>
                                                                    <option><?php echo $r_pt[3] ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                                
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Election for</td>
                                                            <td>
                                                                <select name="ef" class="form-control">
                                                                    <option>Choose</option>
                                                                    <?php
                                                                    $seltt=mysqli_query($dbcon,"select * from eletype where colid='$em'");
                                                                    while($rtt=mysqli_fetch_row($seltt))
                                                                    {
                                                                        ?>
                                                                    <option value="<?php echo $rtt[0] ?>"><?php echo $rtt[1] ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Department</td>
                                                            <td>
                                                                <select name="dep" id="dep10" style="width: 100%; height: 35px; border: 1px solid yellowgreen;" onchange="loadsem(this.value)">                            
                                                                <option value="0">Choose</option>
                                                            <?php
                                                                if($r_e[3]==0)
                                                                {
                                                                $sel_dep=mysqli_query($dbcon,"select * from dep_data where col_id='$em'");
                                                                }
                                                                else{
                                                                    $sel_dep=mysqli_query($dbcon,"select * from dep_data where col_id='$em' and id='$r_e[3]'");
                                                                }
                                                                while($r_dep=mysqli_fetch_row($sel_dep))
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
                                                            <td>
                                                                <span id="semm">
                                                                <select name="sem"  style="width: 100%; height: 35px; border: 1px solid yellowgreen;">
                                                                    <option value="0">Choose</option>
                                                                </select>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <span id="slist"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Candidate ID</td>
                                                            <td><input type="text" name="cid" id="cid" class="form-control" readonly="readonly" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><center><input type="submit" name="sub" value="ADD NOW" class="btn btn-success" /></center></td>
                                                        </tr>
                                                    </table>
                                                    <?php
                                                    }
                                                    ?>
                                                    </div>
                                                    <div class="col-lg-6">
                                                     <?php
                                                     if(isset($_GET['x']))
                                                     {
                                                         ?>
                                                        <h3>CANDIDATE DETAILS</h3>
                                                        <?php
                                                        $selx=mysqli_query($dbcon,"select * from eletype where colid='$em'");
                                                        if(mysqli_num_rows($selx)>0)
                                                        {
                                                         while($rx=mysqli_fetch_row($selx))
                                                         {
                                                        ?>
                                                        <table class="table table-bordered table-condensed table-hover">
                                                            <tr>
                                                                <td colspan="3"><center><b><font color="green"><?php echo $rx[1] ?></font></b></center></td>
                                                            </tr>
                                                            <?php
                                                            $sel_de1=mysqli_query($dbcon,"select distinct dep from candidate_data where eid='".$_GET['eid']."' and el_for='$rx[0]'");
                                                            while($r_d1=mysqli_fetch_row($sel_de1))
                                                            {
                                                                ?>
                                                            <tr>
                                                                <td colspan="3"><b><?php
                                                                $sel_dn=mysqli_query($dbcon,"select * from dep_data where id='$r_d1[0]'");
                                                                $r_dn=mysqli_fetch_row($sel_dn);
                                                                echo $r_dn[2]; 
                                                                ?></b></td>
                                                            </tr>
                                                            <?php
                                                            $sel_sem=mysqli_query($dbcon,"select distinct sem from candidate_data where eid='".$_GET['eid']."' and el_for='$rx[0]' and dep='$r_d1[0]'");
                                                            while($r_sem=mysqli_fetch_row($sel_sem))
                                                            {
                                                             ?>
                                                            <tr>
                                                                <td colspan="3"><center>
                                                                    <?php
                                                                    $sel_s1=mysqli_query($dbcon,"select * from sem_data where id='$r_sem[0]'");
                                                                    $r_s1=mysqli_fetch_row($sel_s1);
                                                                    echo $r_s1[3];
                                                                    ?></center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                
                                                            <?php
                                                            $sel_cid=mysqli_query($dbcon,"select * from candidate_data where eid='".$_GET['eid']."' and el_for='$rx[0]' and dep='$r_d1[0]' and sem='$r_sem[0]'");
                                                            $i=0;
                                                            while($r_cid=mysqli_fetch_row($sel_cid))
                                                            {
                                                                ?><td><center>
                                                                    <table class="table table-bordered table-condensed table-hover">
                                                                        <tr>
                                                                            <td><center>
                                                                                <?php
                                                                                $sel_usr=mysqli_query($dbcon,"select * from cit_data where reg_num='$r_cid[8]'");
                                                                                $r_usr=mysqli_fetch_row($sel_usr);
                                                                                ?>
                                                                                <img src="stud_pic/<?php echo $r_usr[11] ?>" width="125" height="130" /><br />
                                                                                <?php echo $r_usr[2] ?>(<?php echo $r_cid[8] ?>)</center></td>
                                                                        </tr>
                                                                    </table></center></td>
                                                               <?php
                                                               $i++;
                                                               if($i>2)
                                                               {
                                                                   echo"</tr>";
                                                                   $i=0;
                                                               }
                                                            }
                                                            ?>
                                                              </tr>
                                                                    <?php
                                                            }                                                                
                                                            }
                                                            ?>
                                                        </table>
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

