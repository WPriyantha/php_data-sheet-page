
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

    <hr>
    <center>
    <h2>Table View</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Country</th>
            <th>Gender</th>
            <th>Language</th>
        </tr>
        <?php
        $i =1;
        $query= "SELECT * FROM tbl_data";
        $result = mysqli_query($connection, $query);
// "*" means all
// So, SELECT * FROM tbl data means--] select all from tbl data table
        if($result -> num_rows > 0){
            while($row = $result -> fetch_assoc()){
                
    
        ?>  
       <tr>
            <td>
            <?php echo $i++ ?>
                <!-- here we can pu this <?php echo $row['id']?>  
                ut, if you any data in middle in the tbl_data, if will not that 
                number in the order so we can give an alter idea of giving a value for var i-->

            </td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['age']?></td>
            <td><?php echo $row['country']?></td>
            <td><?php echo $row['gender']?></td>
            <td><?php echo $row['languages']?></td>
            <td>
                <a href = "#">Edit</a> |
                <a href = "#">Delete</a>

            </td>
       </tr>
       <!-- here we add the last two curly brackets of the above if condition to insert those values into this row  -->
       <!-- to connect with the above php functions here also we put the curly brackets in a php tag -->
       <?php
                 }
            }
     ?>
    </table></center>
</body>

</html>