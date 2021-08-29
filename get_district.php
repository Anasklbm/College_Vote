<?php
include './connection.php';
$q=$_GET['q'];
//$db_handle = new DBController();
$sel_dis=mysqli_query($dbcon,"SELECT * FROM district WHERE StCode = '$q'");
if(mysqli_num_rows($sel_dis)>0)
{
 ?>
<select name="district" class="form-control">
<?php
    while($r_dis=mysqli_fetch_row($sel_dis))
    {
        ?>
<option value="<?php echo $r_dis[0] ?>"><?php echo $r_dis[2] ?></option>
            <?php
    }
    ?>
</select>
<?php
	
}
?>
