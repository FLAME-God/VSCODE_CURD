<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        #add-emp .error
        {
            color: red;
        }
        #add-emp .ph_error
        {
            color: red;
            font-size: 20px;
        }
    </style>
    <?php
    include_once 'conn.php';
    $eid=$_GET['id'];
    if(!empty($eid)) {
        $q = "select ename,email,phno from emp where `id`=" . $eid . "";
        $r = $mysqli->query($q);


            ?>

</head>
<body>
<body>
<div class="container">
    <h2>Employees Management</h2>
    <div class="panel-group">
        <div class="panel panel-primary">
            <div class="panel-heading">Update Employee
                <span class="btn btn-info pull-middle">
                    <a href="listemp.php">
                    List Of Employee</a></span>
                <span class="btn btn-info pull-right">
                    <a href="#">
                    Home</a></span>
            </div>
            <div class="panel-body">
                <?php
                if ($r->num_rows ==1) {

                //print_r($r->fetch_all());
                foreach ($r->fetch_all() as $e)
                {
                ?>
                <form
                    action="<?php echo $_SERVER['PHP_SELF'];?>"
                    method="post" id="add-emp">
                    <div class="form-group">
                        <label for="Name">Name:</label>
                        <input type="name" class="form-control" name="name"
                        value=<?php echo $e[0]; ?>>
                        <br>
                        <span class="error">

      </span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" name="email"
                               value=<?php echo $e[1]; ?>>
                        <br>
                        <span class="error">

      </span>
                    </div>
                    <div class="form-group">
                        <label for="phno">Phone Number:</label>
                        <input type="text" class="form-control" name="phno"
                               value=<?php echo $e[2]; ?>>
                        <br>
                        <span class="ph_error">

      </span>
                    </div>
            </div>
        </div>
        <?php
        }
        }
        else {
        header("location:error.php");
        }

        }
        ?>
        <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
</div>

</body>
</html>