<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>
    login page
  </title>
  <style>
    .main{
      display: flex;
      justify-content: center;
      align-items: center;
      
    }
    .one{
      display: flex;
      align-items: flex-start;
      justify-content: center;

    }
    .two{
      margin-top: 40px;
      background-color: rgb(245, 245, 245);
      height: 400px;
      width: 350px;
      padding-left: 30px;
      display: flex;
      flex-direction: column;
      border: 1px solid black;
      border-radius: 10px;

    }
    .input-field {
        margin: 10px 0;
      }

      input[type="email"],
      input[type="password"] {
        width: 45%;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 5px;
          font-size: medium;
        }

        .button {
            background-color: black;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            
            
            
        }

    .login-button:hover {
      background-color: #fd4949;
    }

    .navbar{
      height: 60px;
      width: 100%;
      background-color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 20px;
      border-top-right-radius: 10px;
      border-top-left-radius: 10px;
    }
  </style>
</head>
<body>
  <div class="navbar">
    <a href="Zara.html"><img src="zara_logo.png" height="100px"></a>
  </div>
  <div class="main">
    <div class="one">
      <?php
      include "connection.php";

      if (isset($_POST['login'])) {

        $email = $_POST['email'];
        $pass = $_POST['password'];

        $sql = "select * from users where email='$email'";

        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {

          $row = mysqli_fetch_assoc($res);

          $password = $row['password'];

          $decrypt = password_verify($pass, $password);


          if ($decrypt) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("location: Zara.html");


          } else {
            echo "<div class='message'>
                    <p>Wrong Password</p>
                    </div><br>";

            echo "<a href='login.php'><button class='btn'>Go Back</button></a>";
          }

        } else {
          echo "<div class='message'>
                    <p>Wrong Email or Password</p>
                    </div><br>";

          echo "<a href='login.php'><button class='btn'>Go Back</button></a>";

        }


      } else {


        ?>
      
      
    </div>
    <div class="two">
      <center><h2 style="color: black; padding-right: 25px;">LOGIN</h2></center>
      <div class="login-container">
          <form action="#" method="post">
              <div class="input-field">
                  <label for="emailaddress" style="font-weight: 600; color: black;">Email Address:</label><br>
                  <input class="input-field" type="email" id="emailaddress" name="email" placeholder="  Enter Your Email" required>
              </div>
              <div class="input-field">
                  <label for="password" style="font-weight: 600; color: black;">Password:</label><br>
                  <input class="input-field password" type="password" id="password" name="password" placeholder=" Enter Your Password"required>
              </div>
              <input type="submit" name="login" id="submit" value="login" class="button">
          </form>
          <P>Don't have an Account? <a href="signup.php"> Register Here</a></P>
      </div>
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