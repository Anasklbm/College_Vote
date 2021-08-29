<?php
include 'connection.php';
if(isset($_POST['sub'])){
    $cn=$_POST['cn'];
    $em=$_POST['em'];
    $pw=$_POST['pw'];
    $con=$_POST['con'];
    $addr=$_POST['addr'];
    $stat=$_POST['state'];
    $district=$_POST['district'];
    $barea=$_POST['barea'];
    $up=$_FILES['up']['name'];
    $ext1=strrpos($up,".");
    $ext=substr($up,$ext1);
    $nfn="$em$ext";
    $ins_cntr=mysqli_query($dbcon,"insert into cntr_info values('','$cn','$em','$pw','$con','$addr','$stat','$district','$barea','$nfn','0')");
    if($ins_cntr>0){
        $ins_log=mysqli_query($dbcon,"insert into user_log values('','$em','$pw','cntr','0')");
        if($ins_log>0){
            if(move_uploaded_file($_FILES['up']['tmp_name'], getcwd()."\\c_pic\\$nfn"))
            {
                header("location:new_cntr.php?t=1");
            }
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
                  <script>
function getdistrict(val) {
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("dist").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "get_district.php?q=" + val, true);
    xmlhttp.send();
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
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
							<li><a href="index.php">Home</a></li>
							<li class="active"><a href="new_cntr.php">New Centre</a></li>
							
							<li><a href="login.php">Login</a></li>							
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
						<div class="col-lg-7">
							<h3>New Center Register Here</h3>
                                                        <table class="table table-bordered table-condensed table-hover table-responsive">
                                                            <tr>
                                                                <td>Center Name</td>
                                                                <td><input type="text" name="cn" id="cn" onblur="chkdata(this.id)" class="form-control" required="required" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email / Login ID</td>
                                                                <td><input type="email" name="em"  class="form-control" required="required" onkeyup="vem(this.value)" /><span id="em"></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Password</td>
                                                                <td><input type="password" name="pw" id="pw" onblur="chkdata(this.id)" class="form-control" required="required" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Contact Number</td>
                                                                <td><input type="text" name="con"class="form-control" required="required" onkeyup="chkc(this.value)" /><span id="o3"></span> </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Address</td>
                                                                <td><textarea name="addr" id="addr" onblur="chkdata(this.id)" class="form-control" required="required"></textarea></td>
                                                            </tr>
                                                            <tr>
                                                                <td>State</td>
                                                                <td><select onChange="getdistrict(this.value);"  name="state" id="state" class="form-control"  required="required">
                                                                <option value="">Select</option>
                                                                            <?php $query =mysqli_query($dbcon,"SELECT * FROM state");
                                                                            while($row=mysqli_fetch_array($query))
                                                                            { ?>
                                                                            <option value="<?php echo $row['StCode'];?>"><?php echo $row['StateName'];?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                </select></td>
                                                            </tr>
                                                            <tr>
                                                                <td>District</td>
                                                                <td><div id="dist"><select name="district" id="district-list" class="form-control">
                                                                <option value="">Select</option>
                                                                        </select></div></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Area</td>
                                                                <td><input type="text" name="barea" id="barea" onblur="chkdata(this.id)" class="form-control"  required="required" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Logo</td>
                                                                <td><input type="file" name="up" class="form-control"  required="required"/></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><center><input type="submit" name="sub" value="Register Now" class="btn btn-success" /></center></td>
                                                            </tr>
                                                        </table>
						</div>
						
						<div class="col-lg-5">
                                                    
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

