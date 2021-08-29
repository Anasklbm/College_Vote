<?php
include './connection.php';
session_start();
if(isset($_SESSION['stud']))
{
$rn=$_SESSION['stud'];
$sel_data=mysqli_query($dbcon,"select * from cit_data where reg_num='$rn'");
$r_data=mysqli_fetch_row($sel_data);
$col=$r_data[1];
$dep=$r_data[4];
$sem=$r_data[5];
}
else{
    header("location:index.php");
}
$vot_id=$_GET['x'];
$eid=$_GET['eid'];
$up_vote=mysqli_query($dbcon,"update candidate_data set vote=vote+1 where id='$vot_id'");
if($up_vote>0)
{
    $ins_vote=mysqli_query($dbcon,"insert into vote_done values('','$col','$eid','1','$rn')");
    if($ins_vote>0){
        ?>
<h3 align="center">Great Job! Your Vote Stored Successfully</h3>
<?php
    }
}
?>