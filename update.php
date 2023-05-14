<?php
include 'config.php';

$id = $_GET['updateid'];

$sql = "SELECT * FROM user WHERE id = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$image = $row['image'];
$name = $row['name'];
$address = $row['address'];
$email = $row['email'];
$password = $row['password'];



if (isset($_POST['submit'])) {
    $image = $_POST["image"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "UPDATE user SET name = '$name', image = '$image', address = '$address', email = '$email' , password = '$password'  WHERE id = $id";

    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location: landing_page.php');
        exit;
    } else {
        die(mysqli_error($con));
    }
}



?> 

<?php 
include 'config.php';




// 

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">

</head>
<!-- <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> -->
<body>
    <div class="container my-5">
        <form method="post" >
        <?php if (!empty($msg)): ?>
                    <div class="alert <?php echo $css_class; ?>">
                        <?php echo $msg; ?>
                    </div>
                <?php endif; ?>

                <div class="form-group">
                
                <img src="images/profile.jpg" onclick="triggerClick()" id="image" height="120" width="120"><br><br>
                <input type="file" class="form-control" placeholder="" onchange="displayImage(this)" name="image" autocomplete="off"
                    value=<?php echo $image; ?>> 
            </div>

            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off"
                    value=<?php echo $name; ?>>
            </div>
            
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" placeholder="Enter your Address" name="address"
                    autocomplete="off" value=<?php echo $address; ?>>
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="email" class="form-control" placeholder="email" name="email" autocomplete="off"
                    value=<?php echo $email; ?>>
            </div>
            <div class="form-group">
                <label>password</label>
                <input type="text" class="form-control" placeholder="password" name="password" autocomplete="off"
                    value=<?php echo $password; ?>>
            </div>

            <button name="submit" type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>



</body>

</html>