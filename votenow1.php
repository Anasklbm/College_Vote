<?php
include 'connection.php';
ob_start();
date_default_timezone_set("Asia/Kolkata");
session_start();
if(isset($_SESSION['stud']))
{
$rn=$_SESSION['stud'];
$sel_data=mysqli_query($dbcon,"select * from cit_data where reg_num='$rn'");
$r_data=mysqli_fetch_row($sel_data);
$col=$r_data[1];
$dep=$r_data[4];
$sem=$r_data[5];
$colid=$col;
}
else{
    header("location:index.php");
}
$eid=$_GET['eid'];
$sel_el=mysqli_query($dbcon,"select * from manage_ele where id='$eid' and col_id='$col'");
if(mysqli_num_rows($sel_el)>0){
    $r_el=mysqli_fetch_row($sel_el);
}
else{
    header("location:votenow.php");
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
	$.ajax({
	type: "POST",
	url: "get_district.php",
	data:'state_id='+val,
	success: function(data){
		$("#district-list").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
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
                                                        <li><a href="profile.php">Profile</a></li>                                                        
                                                        <li><a href="election.php">Election</a></li>
                                                        <li><a href="stresult.php">Result</a></li>
                                                        <li class="active"><a href="votenow.php">Vote Now</a></li>
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
                                                <script type="text/javascript">
                        function loadvote(h,x,y)
                        {   
                            $("#nodone"+h).hide();
                            $("#done"+h).show();
                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                              if (xhttp.readyState == 4 && xhttp.status == 200) {
                               document.getElementById("rslt").innerHTML = xhttp.responseText;
                              }
                            };
                            xhttp.open("GET", "load_crep.php?x="+x+"&eid="+y, true);
                            xhttp.send();
                        }
                        function loadvote1(x,y)
                        {   
                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                              if (xhttp.readyState == 4 && xhttp.status == 200) {
                               document.getElementById("rslt1").innerHTML = xhttp.responseText;
                              }
                            };
                            xhttp.open("GET", "load_crep1.php?x="+x+"&eid="+y, true);
                            xhttp.send();
                        }
                        </script>
						<div class="col-lg-12">
                                                    <div class="col-lg-3">
                                                        <table class="table table-bordered table-condensed table-hover">
                                                            <tr>
                                                                <td><center><img src="stud_pic/<?php echo $r_data[11] ?>" width="140" height="150" /><br />
                                                            <?php echo $r_data[2] ?>
                                                            </center></td>
                                                            </tr>
                                                            
                                                        </table>
                                                    </div>
						<div class="col-lg-6">
                                                    
                                                    
                                                    <div id="vote11">
							<h3>ELECTION PORTAL</h3>
                                                        <?php
                                                        $dt=date('Y-m-d');
                                                        
                                                            $date2="$r_el[6]$r_el[7]";
                                                            $date3="$r_el[6]$r_el[8]";
                                                            $datetime1 = new DateTime();                                                           
                                                            $datetime2 = new DateTime($date2);
                                                            $datetime3 = new DateTime($date3);
                                                            if($datetime1<$datetime2)
                                                            {
                                                            ?>
                        <script type="text/javascript">
                        var auto_refresh = setInterval(
                        function ()
                        {
                        $('#diff').load('time_dif.php?eid=<?php echo $_GET['eid'] ?>').fadeIn(100);
                        }, 1000); // refresh every 10000 milliseconds
                        </script>
                                                        <span id="diff">
                                                            <?php                                                           
                                                            $interval = $datetime1->diff($datetime2);
                                                            echo $interval->format('%D day %h hours %i minutes %s Seconds'); 
                                                            ?>                                                           
                                                        </span>
                                                            <?php
                                                            }
                                                            else if($datetime1>$datetime3)
                                                            {
                                                                echo"<h3>Time Over</h3>";
                                                            }
                                                            else
                                                            {
                                                               ?>
                        
                        <?php
                        $selx=mysqli_query($dbcon,"select * from eletype where colid='$colid'");
                        if(mysqli_num_rows($selx)>0)
                        {
                            $h=0;
                         while($rx=mysqli_fetch_row($selx))
                         {
                             $h++;
                             ?>
                        <div id="done<?php echo $h ?>" style="display: none;">
                            <h3 style="background-color:red; color: white; padding: 10px; text-align: center;">Thanks for Voting</h3>
                        </div>
                        <div id="nodone<?php echo $h ?>">
                        <table class="table table-bordered table-condensed table-hover table-responsive">
                            <tr>
                                <td colspan="3" style="background-color: green; color:white"><center><b>SELECT YOUR <?php echo $rx[1] ?></b></center></td>
                            </tr>
                            <tr id="rslt">
                                <?php
                                $ele_chk=mysqli_query($dbcon,"select * from vote_done where ele_id='$eid' and ele_typ=1 and reg_num=$rn");
                                if(mysqli_num_rows($ele_chk)>0)
                                {
                                   ?>
                                <td><h3 align="center">Already Done!!</h3></td>
                                <?php
                                }
                                else
                                {
                                $sel_cr=mysqli_query($dbcon,"select * from candidate_data where eid='$eid' and el_for='$rx[0]'");
                                $i=0;
                                while($r_cr=mysqli_fetch_row($sel_cr))
                                {
                                ?>
                                <td>
                                    <div>
                                    <center>
                                    <?php
                                    $sel_usr=mysqli_query($dbcon,"select * from cit_data where reg_num='$r_cr[8]'");
                                    $r_usr=mysqli_fetch_row($sel_usr);
                                    ?>
                                    <img src="stud_pic/<?php echo $r_usr[11] ?>" width="125" height="130" /><br />
                                    <b><?php echo $r_usr[2] ?></b>(<?php echo $r_cr[8] ?>)<br />
                                    <?php echo"$r_cr[6] : $r_cr[7]"; ?><br />
                                    <div style="background-color: orchid; padding: 5px; border-top-left-radius: 15px; border-bottom-right-radius:15px; box-shadow: 1px 2px 2px black; ">
                                        <input type="radio" id="<?php echo $r_cr[0] ?>" name="cr" onclick="loadvote('<?php echo $h ?>',this.id,'<?php echo $eid ?>')" /> Vote Now
                                    </div>
                                    </center>
                                  </div>  
                                </td>
                                <?php
                                $i++;
                                if($i>2){
                                    echo "</tr>";
                                    $i=0;
                                }
                                }
                                }
                                ?>
                            </tr>
                        </table>
                        </div>
                        <?php
                         }
                        }

                            }

                        ?>
						</div>
						
						<div class="col-lg-5">
                                                    
						</div>
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

