<?php
include_once 'conn.php';

$name=$email=$phno="";
$err_name=$err_email=$err_phno="";
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $name=trim($_POST['name']);
    if(empty($name))
        $err_name="Please Enter Your name";
    $email=trim($_POST['email']);
    if(empty($email))
        $err_email="Please Enter Your Email";
    $phno=trim($_POST['phno']);
    if(preg_match('/^[0-9]{10}+$/', $phno)) {
        $err_phno= "Valid Phone Number";
    } else {
        $err_phno= "Invalid Phone Number";
    }
    if(!empty($name) && !empty($email) && !empty($phno))
    {
        $sql="INSERT INTO `emp` (`ename`, `email`, `phno`) VALUES (?,?,?)";
        if($stmt=$mysqli->prepare($sql))
        {
            $stmt->bind_param("ssi", $name,$email,$phno);
            if($stmt->execute()) {
                //success
                header("location:listemp.php");
            }
            else
            {
                //error
                header("location:error.php");
            }
        }
    }

}

?>
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
</head>
<body>
<body>
<div class="container">
  <h2>Panels with Contextual Classes</h2>
  <div class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading">Panel with panel-primary class</div>
      <div class="panel-body">

      <form
              action="<?php echo $_SERVER['PHP_SELF'];?>"
              method="post" id="add-emp">
  <div class="form-group">
    <label for="Name">Name:</label>
    <input type="name" class="form-control" name="name">
      <br>
      <span class="error">
          <?php
          echo $err_name;
          ?>
      </span>
  </div>
    <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email">
        <br>
        <span class="error">
          <?php
          echo $err_email;
          ?>
      </span>
  </div>
  <div class="form-group">
    <label for="phno">Phone Number:</label>
    <input type="text" class="form-control" name="phno">
      <br>
      <span class="ph_error">
          <?php
          echo $err_phno;
          ?>
      </span>
  </div>
</div>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
    </form>
      </div>
       </div>
</div>

</body>
</html>