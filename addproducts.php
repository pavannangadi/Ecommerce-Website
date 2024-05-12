<?php
    $servername = "localhost: 3306";
    $username = "root";
    $password = "";
    $dbname = "products";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (isset($_POST["btnsave"])) {
        $sname = $_POST['txtfullname'];
        $scost = $_POST['txtaddress'];

        // $file_name = $_FILES['avatar']['name'];
        // $tempname = $_FILES['avatar']['temp_name'];
        // $folder = 'uploadImage/'.$file_name;
        
        $image= addslashes(file_get_contents($_FILES['avatar']['tmp_name']));
        $image_name= addslashes($_FILES['avatar']['name']);
        $image_size= getimagesize($_FILES['avatar']['tmp_name']);
        move_uploaded_file($_FILES["avatar"]["tmp_name"],"uploadImage/" . $_FILES["avatar"]["name"]);
        $location="uploadImage/" . $_FILES["avatar"]["name"];
        $sql = " INSERT INTO items(Name,Image,Price) VALUES ('$sname','$location','$scost')";
        if (mysqli_query($conn, $sql)) {
            header("Location: Products.php");
        } else {
            $_SESSION['error'] = 'Editing Was Not Successful';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        .navbar{
            height: 60px;
            width: 100%;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            border-bottom: 3px solid black;
            border-top-right-radius: 10px;
            border-top-left-radius: 10px;
        }

        .content{
            display: flex;
            justify-content: center;
        }

        .container{
            width: 350px;
            height: 400px;
            margin-top: 40px;
            background-color: rgb(245, 245, 245);
            padding-left: 30px;
            display: flex;
            flex-direction: column;
            border: 3px solid black;
            border-radius: 10px;
        }

        .form-control{
            margin: 10px 0;
        }

        input[type="text"],
        input[type="number"] {
        width: 65%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: medium;
        }

        .text-center{
            margin: 2px;
        }

        .btn-primary {
            background-color: black;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;   
        }

        .btn-primary:hover {
            background-color: #fd4949;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="index.php"><img src="zara_logo.png" height="50px"></a>
    </div>
    <div class="content">
        <div class="container">
            <h2>Add your Product:</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group"><strong>
                    <label style="font-weight: 600;">Product Name:</label></strong><br>
                    <input type="text" size="50" name="txtfullname" class="form-control" placeholder="   Enter Your Product Name">
                </div><br>
                <div>
                    <label for="exampleInputPassword1" style="font-weight: 600;">Upload Product Image:</label>
                    <p class="text-center">
                        <input type="file" name="avatar" id="avatar" required class="form-control form-control-sm rounded-0" accept="image/png,image/jpeg,image/jpg" onChange="display_img(this)">
                    </p>
                </div><br>
                <div class="form-group">
                    <label style="font-weight: 600;">Cost:</label><br>
                    <input type="number" size="77" name="txtaddress"  class="form-control" placeholder="   Enter Your Product Cost">
                </div><br>
                <div class="card-footer">
                    <button type="submit" name="btnsave" class="btn btn-primary">Save</button>
                </div>   
            </form>
        </div>
    </div>      
</body>
</html>