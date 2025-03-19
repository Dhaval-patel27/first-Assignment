<?php 
include("db.php");

$delid=$_GET['delid'];
$delete="DELETE FROM ass_tbl WHERE a_id='$delid'";
$query=mysqli_query($conn, $delete);
if($query){
    header("location:admin.php");
}else{
    echo "No Delete Data!!";
}


?>