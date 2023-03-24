<?php
$connection = mysqli_connect("localhost", "root", "", "db1");

$id = $_GET['id'];
$query = "DELETE FROM tbl_data WHERE id = $id";
if(mysqli_query($connection, $query)){
        header('location: class.php');
}else{
    echo mysqli_error($connection);

}
?>