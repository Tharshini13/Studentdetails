<?php

?>
<?php
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"students");    
    $edit=$_GET['edit'];
    $sql="select * from stud where id='$edit'";
    $run=mysqli_query($connection,$sql);
    while($row=mysqli_fetch_array($run))
    {
        $uid=$row['id'];
        $name=$row['name'];
        $age=$row['age'];
        $mobile=$row['mobile'];
        $gender=$row['gender'];
        $programming=$row['programming'];
    }
?>
<?php
    
    if(isset($_POST['submit']))
    {
        $edit=$_GET['edit'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $mobile = $_POST['mobile'];
        $gender=$_POST['gender'];
        $programming=$_POST['programming'];
        $sql="update stud set name='$name',age='$age',mobile='$mobile',gender='$gender',programming='$programming' where id='$edit'";
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
<body background=editt.jpg>
    <br><br><br>
    <center><h1>Edit Page</h2></center>
    <div class=container>
        <div class=row>
        <center><div class=col-4 >
                <div class=card>
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                    <form action="add.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?php echo $name; ?>">
                        </div><br>
                        <div class="form-group">
                            <input type="text" class="form-control" name="age" placeholder="Enter Age" value="<?php echo $age; ?>">
                        </div><br>
                        <div class="form-group">
                            <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile" value="<?php echo $mobile; ?>">
                        </div><br><br>
                        <b><p align="left">Gender</p></b>
                        <div class="form-group">
                            <input type="radio" name="gender" value="Female" Checked>Female&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="gender" value="Male" >Male
                        </div><br>
                        <p align="left"><b>Skills</b>
                        <div class="form-group">
                            <input type="checkbox" name="programming">Are you a programmer??
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