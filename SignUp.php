<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        .input-field {
        margin: 10px 0;
      }

      input[type="text"],
      input[type="email"],
      input[type="password"] {
        width: 90%;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 5px;
          font-size: medium;
        }

        .login-button {
            background-color: white;
            color:black;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            
        }

    .login-button:hover {
      background-color: black;
      color:white;
    }
    .main1{
        width: 25%;
        margin-top: 20px;
        margin-left: 37%;
        display: grid;
        background-color:rgb(245, 245, 245);
        padding-left: 10px;
        border-radius: 10px;
        padding-bottom: 10px;
        border: 1px solid black;
    }
    .navbar{
      height: 60px;
      width: 100%;
      background-color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 30px;
      border-top-right-radius: 10px;
      border-top-left-radius: 10px;
    }
    </style>
</head>
<body>
    <div class="navbar">
      <img src="zara_logo.png" height="100px">
    </div><br>
    <div class="main1">
        <h2 style="text-align: center; color: black">REGISTER </h2>
        <div class="login-container">
            <form action="#" method="post">
                <?php

                    session_start();

                    include "connection.php";

                    if (isset($_POST['register'])) {

                        $name = $_POST['username'];
                        $email = $_POST['email'];
                        $pass = $_POST['password'];
                        $cpass = $_POST['cpass'];


                        $check = "select * from users where email='{$email}'";

                        $res = mysqli_query($conn, $check);

                        $passwd = password_hash($pass, PASSWORD_DEFAULT);

                        $key = bin2hex(random_bytes(12));




                        if (mysqli_num_rows($res) > 0) {
                        echo "<div class='message'>
                    <p>This email is used, Try another One Please!</p>
                    </div><br>";

                        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";


                        } else {

                        if ($pass === $cpass) {

                            $sql = "insert into users(username,email,password) values('$name','$email','$passwd')";

                            $result = mysqli_query($conn, $sql);

                            if ($result) {

                            echo "<div class='message'>
                <p>You are register successfully!</p>
                </div><br>";

                            echo "<a href='login.php'><button class='btn'>Login Now</button></a>";

                            } else {
                            echo "<div class='message'>
                    <p>This email is used, Try another One Please!</p>
                    </div><br>";

                            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
                            }

                        } else {
                            echo "<div class='message'>
                <p>Password does not match.</p>
                </div><br>";

                            echo "<a href='signup.php'><button class='btn'>Go Back</button></a>";
                        }
                      }
                    } else {

                      ?>


                <div class="input-field">
                    <label for="username" style="font-weight: 600; color: black">Username</label><br>
                    <input class="input-field" type="text" id="emailaddress" name="username" class="input-field" placeholder="  Enter Your Username" required>
                </div>
                <div class="input-field">
                    <label for="emailaddress" style="font-weight: 600; color: black">Email address</label><br>
                    <input class="input-field" type="email" id="emailaddress" name="email" class="input-field" placeholder="  Enter Your Email" required>
                </div>
                <div class="input-field">
                    <label for="password" style="font-weight: 600; color: black">Password:</label><br>
                    <input class="input-field password" type="password" name="password" placeholder=" Enter Your Password"required>
                </div>
                <div class="input-field">
                    <label for="password" style="font-weight: 600; color: black">Confirm Password:</label><br>
                    <input class="input-field password" type="password" name="cpass" placeholder=" Confirm Password"required>
                </div>
                
                <P>Already have an Account? <a href="login.php"> Login</a></P>

                <button type="submit" class="login-button" id="submit" name="register" style="margin-left: 32%;">Register</button>
            </form>
        </div>
        <?php
          }
          ?>
    </div>
    <script>
      const toggle = document.querySelector(".toggle"),
        input = document.querySelector(".password");
      toggle.addEventListener("click", () => {
        if (input.type === "password") {
          input.type = "text";
          toggle.classList.replace("fa-eye-slash", "fa-eye");
        } else {
          input.type = "password";
        }
      })
    </script>
</body>
</html>