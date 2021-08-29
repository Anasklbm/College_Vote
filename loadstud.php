<table class="table table-bordered table-condensed table-responsive">
    <tr>
<?php
include './connection.php';
session_start();
$em=$_SESSION['cntr'];
$d=$_GET['d'];
$s=$_GET['s'];
$sel_st=mysqli_query($dbcon,"select * from cit_data where col_id='$em' and dep='$d' and sem='$s'");
$i=0;
while($r_st=mysqli_fetch_row($sel_st))
{
    ?>
        <td><center>
            <img src="stud_pic/<?php echo $r_st[11] ?>" width="150" height="145" />
            <br /><b><?php echo $r_st[2] ?></b>(<?php echo $r_st[3] ?>)</center>
        </td>
        <?php
        $i++;
        if($i>2){
            echo "</tr>";
            $i=0;
        }
}
?>
    </tr>
</table>

