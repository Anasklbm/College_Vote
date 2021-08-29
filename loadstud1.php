<table class="table table-bordered table-condensed table-responsive">
    <tr>
        <td>#</td>
        <td>Student Name</td>
        <td>Register Number</td>
        <td>More</td>
    </tr>
<?php
include './connection.php';
session_start();
$em=$_SESSION['cntr'];
$d=$_GET['d'];
$s=$_GET['s'];
$sel_st=mysqli_query($dbcon,"select * from cit_data where col_id='$em' and dep='$d' and sem='$s'");
$i=1;
while($r_st=mysqli_fetch_row($sel_st))
{
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $r_st[2] ?></td>
        <td><?php echo $r_st[3] ?></td>
        <td><input type="radio" name="snme" value="<?php echo $r_st[3] ?>" onclick="loadstid(this.value)" /></td>
    </tr>
            
        <?php
        $i++;        
}
?>    
</table>

