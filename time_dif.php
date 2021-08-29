<?php
date_default_timezone_set("Asia/Kolkata");
include './connection.php';
$eid=$_GET['eid'];
$sel_el=mysqli_query($dbcon,"select * from manage_ele where id='$eid'");
if(mysqli_num_rows($sel_el)>0){
    $r_el=mysqli_fetch_row($sel_el);
}
$date2="$r_el[5]$r_el[6]";
$datetime1 = new DateTime();                                                           
$datetime2 = new DateTime($date2);
if($datetime1<$datetime2)
{
$interval = $datetime1->diff($datetime2);
echo $interval->format('%D day %h hours %i minutes %s Seconds'); 
}
else
{
    ?>
<a href="votenow1.php?eid=<?php echo $eid ?>">Click to Vote</a>
<?php
}
?>