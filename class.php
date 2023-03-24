
<?php
require 'connection.php';
// adding a comment to check push command- Test comment"
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $age = $_POST["age"];
    $country = $_POST["country"];
    $gender = $_POST["gender"];
    $languages = $_POST["languages"];

    $query = "INSERT INTO tbl_data VALUES('', '$name', '$age', '$country', '$gender', '$languages')";
    mysqli_query($connection, $query);

     echo "<script> alert('Details Submitted Successfully'); </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP class with Data base management</title>
</head>
<body>
    <center>
        <br>
    <form class="" action="" method="post">
            <label for="">Name</label>
            <input type="text" name="name"> <br><br>

            <label for="">Age</label>
            <input type="text" name="age"> <br><br>

            <label for="">Country</label>
            <select name="country" id="">
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="India">India</option>
                    <option value="Ireland">Ireland</option>
                    <option value="England">England</option>

            </select> <br><br>

            <label for="">Gender</label>
            <input type="radio" name="gender" value="male">Male 
            <input type="radio" name="gender" value="female">Female
            <br><br>

            <label for="">Languages</label>
            <input type="text" name="languages"> <br><br>

            <button type="submit" name="submit">Submit</button>
    </form></center>
</body>
</html>