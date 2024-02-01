
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<body>
<div class="container">
    <h2>Employee Management</h2>
    <div class="panel-group">
        <div class="panel panel-primary">
            <div class="panel-heading">List Employees
                <span class="btn btn-info pull-middle">
                    <a href="add-employee.php">
                    Add</a></span>
                <span class="btn btn-info pull-right">
                    <a href="#">
                    Home</a></span>
            </div>
            <div class="panel-body">

                <table class="table table-striped">
                    <thead>
                    <tr >
                        <th>ID</th>
                        <th>Emp Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        <?php
                        include_once 'conn.php';
                        $q="select * from emp";
                        $r=$mysqli->query($q);

                        if($r->num_rows>0)
                        {
                            //echo "<h1>pol</h1>";

                            foreach ($r->fetch_all() as $e)
                            {
                                ?>
                        <tr>
                        <td><?php echo $e[0]; ?></td>
                            <td><?php echo $e[1]; ?></td>
                            <td><?php echo $e[2]; ?></td>
                            <td><?php echo $e[3]; ?></td>

                        <td>
                            <a href="edit.php?id=<?php echo $e[0]; ?>" class="btn btn-warning">Edit</a>
                            <a href="del.php?id=<?php echo $e[0]; ?>" class="btn btn-danger">Delete</a>
                        </td>
                        <?php
                            }
                            echo "</tr>";
                        }
                        else
                        {
                            ?>
                            <tr><td colspan="5" align="center" style="font-size: 100px">No Record</td></tr>
                            <?php
                        }
                        ?>


                    </tbody>
                </table>
    </div>
</div>
</div>

</body>
</html>