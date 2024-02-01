<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <?php
    include_once 'conn.php';
    if($_SERVER['REQUEST_METHOD']=="GET") {
        $eid = $_GET['id'];
        $name = "";
        $q = "select * from emp where `id`=?";
        if ($stmt = $mysqli->prepare($q)) {
            $stmt->bind_param("i", $eid);
            if ($stmt->execute()) {

                $r = $stmt->get_result();
                if ($r->num_rows > 0) {
                    foreach ($r->fetch_all() as $e) {
                        $name = $e[1];
                    }
                } else {
                    header("location:error.php");
                }
            }
        }
    }
    if($_SERVER['REQUEST_METHOD']=="POST") {
        $eid = $_REQUEST['id'];
    
                    $delq="DELETE FROM `emp` WHERE `emp`.`id` = ?";
                    if ($stmt1 = $mysqli->prepare($delq)) {
                        $stmt1->bind_param("i", $eid);
                        if ($stmt1->execute()) {

                            header("location:listemp.php");
                        } else {

                            header("location:error.php");
                        }
                    }
                }
    ?>
</head>
<body>
<body>
<div class="container">
    <h2>Employee Management</h2>
    <div class="panel-group">
        <div class="panel panel-primary">
            <div class="panel-heading">Delete Employee</div>
            <div class="panel-body">
                <form
                    action="
                    <?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $eid; ?>"
                    method="post" >
            <div class="alert alert-danger">
                Are You Sure To Delete <b style="font-size: 20px">
                    <?php echo $name;?> </b> Employee
            </div>
                <input type="submit" class="btn btn-success" value="Yes"></input>
                <a href="listemp.php" class="btn btn-default">No</a>
                </form>
</div>
</div>

    </div>
    </div></div>
</body>
</html>