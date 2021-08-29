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
if(isset($_POST['sub'])){
    $eid=$_GET['eid'];
    $etp=$_POST['etp'];
    $prty=$_POST['prty'];
    $ef=$_POST['ef'];
    $dep=$r_data[4];
    $sem=$r_data[5];
    $cid=$_POST['cid'];
    $ins_cand=mysqli_query($dbcon,"insert into candidate_data values('','$colid','$eid','$dep','$sem','$ef','$etp','$prty','$cid','0','1')");
    if($ins_cand>0){
        header("location:election.php");
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
                                                    <li><a href="student.php">Home</a></li>
							<li><a href="profile.php">Profile</a></li>                                                        
                                                        <li class="active"><a href="election.php">Election</a></li>
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
                                                        if(isset($_GET['x']))
                                                        {
                                                            ?>
                                                        
                                                     <?php
                                                     if(isset($_GET['x']))
                                                     {
                                                         ?>
                                                        <a href="election.php" class="label label-success pull-right">BACK</a>
                                                        <h3>CANDIDATE DETAILS</h3>
                                                        <?php
                                                        $selx=mysqli_query($dbcon,"select * from eletype where colid='$colid'");
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
                                                        
                                                        
                                                        <?php
                                                     
                                                     ?>
                                                    
                                                        <?php
                                                        }
                                                        else
                                                        {
                                                        ?>
                                                        <h3 style="background-color: #449d44; color: white; padding: 5px;">Available Election</h3>
                                                        <?php
                                                        $dt=date('Y-m-d');
                                                        $sele=mysqli_query($dbcon,"select * from manage_ele where dt>'$dt' and col_id='$colid'");
                                                        if(mysqli_num_rows($sele)>0)
                                                        {
                                                            ?>
                                                        <table class="table table-bordered table-condensed table-hover">
                                                        <tr>
                                                            <td>#</td>
                                                            <td>Election Title</td>
                                                            <td>Nomination Before</td>
                                                            <td>Election Date</td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <?php
                                                        $i=0;
                                                        while($re=mysqli_fetch_row($sele))
                                                        {
                                                            $i++;
                                                            ?>
                                                        <tr>
                                                            <td><?php echo $i ?></td>
                                                            <td><b><?php echo $re[2] ?></b><br />
                                                            <?php 
                                                            $sel_ecat=mysqli_query($dbcon,"select * from ele_cat where col_id='$colid' and id='$re[4]'");
                                                            $recat=mysqli_fetch_row($sel_ecat);
                                                            echo $recat[2];
                                                            
                                                            ?>
                                                            </td>
                                                            <td><?php
                                                            echo date("d-M-Y",strtotime($re[5]));
                                                            ?></td>
                                                            <td><?php
                                                            echo date("d-M-Y",strtotime($re[6]));
                                                            ?></td>
                                                            <td>
                                                                <?php
                                                                if($re[5]>$dt)
                                                                {
                                                                    $chk=mysqli_query($dbcon,"select * from candidate_data where col_id='$colid' and eid='$re[0]' and cand_id='$em'");
                                                                    if(mysqli_num_rows($chk)>0)
                                                                    {
                                                                        ?>
                                                                <div class="label label-success">NOMINATION POSTED</div>
                                                                <?php
                                                                    }
                                                                    else
                                                                    {
                                                                    ?>
                                                                <a href="election.php?x=1&t=1&eid=<?php echo $re[0] ?>"><div class="label label-danger">POST NOMINATION</div></a>
                                                                <?php
                                                                    }
                                                                }
                                                                else{
                                                                    ?>
                                                                <div class="label label-warning">OUT OF DATE</div>
                                                                <?php
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <a href="election.php?x=1&eid=<?php echo $re[0] ?>"><span class="glyphicon glyphicon-user"></span></a>
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
                                                            echo"No data Found";
                                                        }
                                                        }
                                                        ?>
                                                        <?php
                                                    if(isset($_GET['t']))
                                                    {
                                                        $sel_e=mysqli_query($dbcon,"select * from manage_ele where id='".$_GET['eid']."' and col_id='$colid'");
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
                                                                $stl_typ=mysqli_query($dbcon,"select * from ele_cat where id='$r_e[4]' and col_id='$colid'");
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
                                                                <select name="ef" class="form-control" required="">
                                                                    <option value="">Choose</option>
                                                                    <?php
                                                                    $seltt=mysqli_query($dbcon,"select * from eletype where colid='$colid'");
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
                                                            <td>Candidate ID</td>
                                                            <td><input type="text" name="cid" id="cid" value="<?php echo $em ?>" class="form-control" readonly="readonly" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><center><input type="submit" name="sub" value="POST NOMINATION" class="btn btn-success" /></center></td>
                                                        </tr>
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

