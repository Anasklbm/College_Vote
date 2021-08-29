<select name="sem"  style="width: 100%; height: 35px; border: 1px solid yellowgreen;">
    <option>Choose</option>
<?php
include './connection.php';
$d=$_GET['q'];
$sel_sem=mysqli_query($dbcon,"select * from sem_data where did='$d'");
while($r_sem=mysqli_fetch_row($sel_sem))
{
    ?>
    <option value="<?php echo $r_sem[0] ?>"><?php echo $r_sem[3] ?></option>
    <?php
}
?>
</select>