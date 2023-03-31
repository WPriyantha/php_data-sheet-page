
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</head>
<body>
    <center>
        <h1 class="alert alert-success">User Basic Information</h1>
        <br>
        <div>
    <form action="" method="post">
    <div class="form-row align-items-center">
        <div class="col-auto">
            <label for="">Name: </label>
            <input type="text" name="name"> <br><br>

            <label for="">Age: </label>
            <input type="text" name="age"> <br><br>

            <label for="">Country: </label>
            <select name="country" id="">
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="India">India</option>
                    <option value="Ireland">Ireland</option>
                    <option value="England">England</option>

            </select> <br><br>

            <label for="">Gender: </label>
            <input type="radio" name="gender" value="Male">Male 
            <input type="radio" name="gender" value="Female">Female
            <br><br>

            <label for="">Languages: </label>
            <input type="text" name="languages"> <br><br>
            </div>
        </div>
        <div class="col-auto my-1">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
        <br>
    </form></center></div>

    <hr>
    <center>
    <h2 class="alert alert-primary">Table View</h2>
    <table border="1" class="table table-hover">
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
                $id = $row['id'];
    
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
                <a href = "edit.php?id=<?php echo $id; ?>"><button type="button" class="btn btn-outline-success">Edit</button></a> |
                <a href = "delete.php?id=<?php echo $id; ?>" onclick="return confirm('Do you want to delete?')"><button type="button" class="btn btn-outline-danger">Delete</button></a>

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