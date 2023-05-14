<?php

include 'config.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $image = $_POST['image'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "insert into `user` (name, image, address, email, password) values ('$name' ,'$image','$address','$email','$password')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // echo "inserted";
        header('location:landing_page.php');
    } else {
        die(mysqli_error($con));
    }
}



?>


<?php


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

    <style>
        .circle-image {
            border-radius: 50%;
            overflow: hidden;
        }
    </style>

</head>

<body>
    <div class="container my-5">
        <form action="" method="post">
            <div class="form-group">


                <?php if (!empty($msg)): ?>
                    <div class="alert <?php echo $css_class; ?>">
                        <?php echo $msg; ?>
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <img src="images/profile.jpg" onclick="triggerClick()" id="image" class="circle-image" height="120"
                        width="120">
                    <label>Image</label> <br> <br>
                    <input type="file" class="form-control" onchange="displayImage(this)" name="image">
                </div>


                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off">

            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" placeholder="Enter your Address" name="address"
                    autocomplete="off">

            </div>
            <div class="form-group">
                <label>email</label>
                <input type="email" class="form-control" placeholder=" your email" name="email" autocomplete="off">
            </div>

            <div class="form-group">
                <label>password</label>
                <input type="text" class="form-control" placeholder=" password " name="password" autocomplete="off">
            </div>


                <button name="submit" type="submit" value="Upload" class="btn btn-primary my-5">Submit</button>
        </form>
    </div>


    <script>
        function displayImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('image').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function triggerClick() {
            document.querySelector('input[name="image"]').click();
        }
    </script>




</body>

</html>