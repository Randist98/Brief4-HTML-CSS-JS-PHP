<?php
@include 'config.php';

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
    <link rel="stylesheet" href="css/style_copy.css">
    <link rel="stylesheet" href="css/table.css">

    <style>
        .upload {
            width: 125px;
            position: relative;
            margin: auto;
            margin-top: 10px
        }

        .upload img {

            border: 4px solid rgb(71, 156, 235);
        }

        .upload .round {

            background: rgb(71, 156, 235);

        }

        .containe {
            margin-left: 40px;
        }

        .circle-image {
            border-radius: 50%;
            overflow: hidden;
        }
        #search{
            width: 50%;
            padding: 10px;
        }
        .con{
            display: grid;
            grid-template-columns: auto auto auto auto;
            gap: 10px;
            margin: 10px;
            padding: 10px;
        }
        .con div {
            background:rgb(159, 203, 244);
            width: 50%;
            height: 100px;
            padding: 15px;
            font-weight: bolder;

        }
    </style>

</head>

<body>

<div class="con">






    <div class="containe">
        <button class="btn btn-primary my-5"> <a href="create.php" class="text-light">Add user</a></button>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Password</th>
                    <th scope="col">Operations</th>

                </tr>
            </thead>
            <tbody>

                <?php

                $sql="select * from `user`";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $image = $row['image'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $address = $row['address'];
                        $password = $row['password'];



                        echo ' <tr>
        <th scope="row">' . $id . '</th>
        <td><img src="data:image/jpeg;base64,'.base64_encode ($image) . '" onclick="triggerClick()" id="image" class="circle-image" height="60" width="60"></td>
        <td>' . $name . '</td>
        <td>' . $address . '</td>
        <td>' . $email . '</td>
        <td>' . $password . '</td>




        <td>
        <button class="btn btn-primary"><a href="update.php?updateid=' . $id . '" class="text-light">Update</a></button>
        <button class="btn btn-danger"><a href="delete.php?deleteid=' . $id . '" class="text-light">Delete</a></button>
        </td>
        </tr> ';

                    }
                }

                ?>


            </tbody>
        </table>
</body>

</html>






