<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header {
            text-align: center;
        }
        .edit {
            text-align: center;
        }
        body {
            background-image: url('bc.png');
            background-size: cover;
        }
        table {
            margin: auto;
        }
        .btn a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Student Details</h1>
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card">
                    <div class="card-header text-center">
                        <strong>Student List</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Mobile</th>
                                    <th>Gender</th>
                                    <th>Programming</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $connection = mysqli_connect("localhost", "root", "", "students");
                                if (!$connection) {
                                    die("Database connection failed: " . mysqli_connect_error());
                                }

                                $sql = "SELECT * FROM stud";
                                $run = mysqli_query($connection, $sql);
                                if (!$run) {
                                    die("Query failed: " . mysqli_error($connection));
                                }

                                $id = 1;
                                while ($row = mysqli_fetch_assoc($run)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                                        <td><?php echo htmlspecialchars($row['age']); ?></td>
                                        <td><?php echo htmlspecialchars($row['mobile']); ?></td>
                                        <td><?php echo htmlspecialchars($row['gender']); ?></td>
                                        <td><?php echo htmlspecialchars($row['programming']); ?></td>
                                        <td>
                                            <a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
                                            <a href="delete.php?del=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                                        </td>
                                    </tr>
                                    <?php 
                                    $id++;
                                } 
                            ?>
                            </tbody>
                        </table>
                        <div class="text-center mt-3">
                            <a href="add.php" class="btn btn-primary">Add New</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</body>
</html>
