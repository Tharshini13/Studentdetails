<?php
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"students");
    $delete=$_GET['del'];
    $sql="delete from stud where id ='$delete'";
    if(mysqli_query($connection,$sql))
        {
            echo '<script>location.replace("index.php")</script>';
        }
        else
        {
            echo 'some error'. $connection->error;
        }
?>