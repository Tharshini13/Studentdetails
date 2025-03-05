<?php
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"students");
    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $mobile = $_POST['mobile'];
        $gender=$_POST['gender'];
        $programming = isset($_POST['programming']) ? "Yes" : "No";
        $sql="insert into stud (name,age,mobile,gender,programming)values('$name','$age','$mobile','$gender','$programming')";
        if(mysqli_query($connection,$sql))
        {
            echo '<script>location.replace("index.php")</script>';
        }
        else
        {
            echo 'some error'. $connection->error;
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .col{
            position:relative;
            left:50px;
        }
        body{
            background-size:cover;
        }
    </style>
</head>
<body background=add.jpg >
    <br><br><br>
    <center><h1>Add Page</h2></center>
    <div class=container>
        <div class=row>
        <center><div class=col-4 >
                <div class=card>
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                    <form action="add.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Enter Name">
                        </div><br>
                        <div class="form-group">
                            <input type="text" class="form-control" name="age" placeholder="Enter Age">
                        </div><br>
                        <div class="form-group">
                            <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile">
                        </div><br>
                        <b><p align="left">Gender</p></b>
                        <div class="form-group">
                            <input type="radio" name="gender" value="Female" Checked>Female&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="gender" value="Male" >Male
                        </div><br>
                        <p align="left"><b>Skills</b>
                        <div class="form-group" margin="left">
                            <input type="checkbox" name="programming" value="Yes"> Are you a programmer?
                        </div><br><br></p>
                        <center><input type="submit" class="btn btn-primary" name="submit" value="Save"></center>
                    </form>
                    </div>
                </div>
            </div></center>
        </div>
    </div>
</body>
</html>