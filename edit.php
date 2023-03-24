<?php
$connection = mysqli_connect("localhost", "root", "", "db1");

$id = $_GET['id'];

$query= "SELECT * FROM tbl_data WHERE id=$id";
        $result = mysqli_query($connection, $query);
        if($result -> num_rows > 0){
            while($row = $result -> fetch_assoc()){
                $User_name = $row['name'];
                $User_age  = $row['age'];
                $User_country = $row['country'];
                $User_gender = $row['gender'];
                $User_language = $row['languages'];
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form class="" action="" method="post">
            <label for="">Name</label>
            <input type="text" name="name" value="<?php echo $User_name; ?>"> <br><br>

            <label for="">Age</label>
            <input type="text" name="age" value="<?php echo $User_age; ?>"> <br><br>

            <label for="" >Country</label>
            <select name="country" id="" >
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="India">India</option>
                    <option value="Ireland">Ireland</option>
                    <option value="England">England</option>

            </select> <br><br>

            <label for="">Gender</label>
            <input type="radio" name="gender" value="Male">Male 
            <input type="radio" name="gender" value="Female">Female
            <br><br>

            <label for="">Languages</label>
            <input type="text" name="languages" value="<?php echo $User_language; ?>"> <br><br>

            <button type="submit" name="update">Update</button>
    </form>
</body>
</html>

<?php
if(isset($_POST["update"])){
    $name = $_POST["name"];
    $age = $_POST["age"];
    $country = $_POST["country"];
    $gender = $_POST["gender"];
    $languages = $_POST["languages"];

    $query = "UPDATE tbl_data SET name='$name', age='$age', country='$country', gender='$gender', languages='$languages' WHERE id ='$id'";
    if(mysqli_query($connection, $query)){
        header('location: class.php');
        echo "<script> alert('Details Updated Successfully'); </script>";
    }

     
}
?>