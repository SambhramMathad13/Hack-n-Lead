<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $cpass = $_POST['cpass'];
  // echo $name.$pass.$cpass;
  // if($name==false || $pass==false ||  $cpass=false)
  // {
  //   echo"<script>
  //   alert('Please fill the form completely...');</script>";
  //   exit;
  // }
  if ($pass != $cpass) {
    echo "<script>
            alert('Password should match with confurm password...');</script>";
  } else {
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, "form");
    if (!$conn) {
      echo "<script>
            alert('Server error please try again...');</script>";
      exit;
    }


    $sql = "SELECT * FROM `ffformss` WHERE `namee`='$name'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($res);
    // echo $row;
    if ($row == 1) {

      echo "<script>
            alert('Username already taken... Please enter other name...');</script>";
    } else {

      $sqll = "SELECT * FROM `ffformss` WHERE `email`='$email'";
      $ress = mysqli_query($conn, $sqll);
      $roww = mysqli_num_rows($ress);
      // echo $row;
      if ($roww == 1) {

        echo "<script>
            alert('Email already taken... Please enter other email...');</script>";
      } else {
       
        
          // echo "<script>alert('An OTP has sent to your email address entered...');</script>";
          session_start();
          $_SESSION['logedin'] = true;
          $_SESSION['name'] = $name;
          $_SESSION['pass'] = $pass;
          $_SESSION['email'] = $email;
          $_SESSION['status'] = $status;
          header("location: emaill.php");
          exit;
        
      }
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sighup</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <style>
        * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html {
  font-size: 62.5%;
  height: 100%;
  margin: 0;
  display: flex;
  align-items: center;
  justify-content: center;
}

body {
  font-family: "Inter", sans-serif;
  line-height: 1;
  font-weight: 400;
  color: #0d131b;
  background-color: #f6f9fe;
}

.container {
  max-width: 130rem;
  padding: 0 3.2rem;
  margin: 0 auto;
}

.grid {
  display: grid;
}

.grid--2-col {
  grid-template-columns: 1fr 1fr;
}
.form-flex-items {
  display: flex;
  flex-direction: column;
  gap: 0.8rem;
  margin-bottom: 2.4rem;
}

.login-gradent-box {
  background-image: linear-gradient(
    to top right,

    #dbcffa,
    #acc1f5,
    #afc9fe,
    #adc5f8,
    #abc4f7,
    #acc1f5
  );
  padding: 15.5rem 7.2rem;
}

.login-gradent--heading-box {
  background-color: rgb(239, 247, 246, 0.2);
  padding: 5rem 9rem 5rem 5rem;
}

.login-gradent--heading {
  font-size: 5.2rem;
  line-height: 1.2;
  color: #fdfdff;
  letter-spacing: -0.6px;
  margin-bottom: 2.4rem;
}

.login-gradent--heading span {
  color: #151531;
}

.login-gradent--text {
  font-size: 1.4rem;
  color: #f6f9fe;
  line-height: 1.6;
  font-weight: 500;
}

.login-form-box {
  background-color: #fff;
  padding: 6.8rem 18rem 6.8rem 8rem;
}

.logo {
  width: 4.8rem;
  margin-bottom: 3.2rem;
}
.login-form--main-text {
  font-size: 3.2rem;
  font-weight: 600;
  line-height: 1.2;
  letter-spacing: -0.5px;
  margin-bottom: 1.6rem;
}
.login-form-text {
  font-size: 1.4rem;
  color: #6686a3;
  margin-bottom: 3.2rem;
}

.login-form div {
  margin-bottom: 5rem;
}

.password-lables {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.lable {
  font-size: 1.4rem;
  font-weight: 500;
  color: #003566;
}

.input {
  width: 100%;
  padding: 1rem;
  font-size: 1.4rem;
  font-family: inherit;
  /* color: inherit; */
  border: 1px solid #99aec2;
  /* background-color: #fdf2e9; */
  border-radius: 5px;
}

.input::placeholder {
  color: #aaa;
}

.btn--form {
  display: block;
  width: 100%;
  font-size: 1.4rem;
  color: #fff;
  padding: 1rem;
  margin-top: 5rem;
  border-radius: 5px;
  background-image: linear-gradient(to bottom, #6868f7, #4c40d9);
  border: none;
  margin-bottom: 1.6rem;
  transition: all 0.3s;
}

.btn--form:hover {
  background-image: linear-gradient(to bottom, #7777f8, #5e53dd);
}

.sign-up--link {
  text-decoration: none;
  display: inline-block;
  align-items: center;
}

.forgot-password-box {
  text-align: center;
}
.link:link,
.link:visited {
  text-decoration: none;
  font-size: 1.4rem;
  color: #003566;
}

.forgot-password:hover,
.forgot-password:active {
  color: #00203d;
}

.create-acc:hover,
.create-acc:active {
  border-bottom: 1px solid #809ab3;
}
    </style>
  </head>
  <body>
    <section class="login">
      <div class="container grid grid--2-col">
        <!-- Login Heading (text box) -->
        <div class="login-gradent-box">
          <div class="login-gradent--heading-box">
            <h1 class="login-gradent--heading">
              <!-- Online voting system for <span>Events.</span> -->
              &gt; Digital platform for Online<span> Voting</span>
            </h1>
            <p class="login-gradent--text">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Perferendis.
            </p>
          </div>
        </div>

        <div class="login-form-box">
          <!-- here we add Logo -->
          <img class="logo" src="logo-removebg-preview.png" alt="logo" />
          <p class="login-form--main-text">Hey, hello 👋</p>
          <p class="login-form-text">
            Please Enter Valid Information to Sign Up
          </p>
          <form name="myForm" action="http://localhost/sam/signup.php?#" method="post">
            <div class="form-flex-items">
              <label class="lable" for="text">Name</label>
              <input
                class="input"
                type="text"
                name="name"
                id=""
                placeholder="sambhram m"
                required
              />
            </div>

            <div class="form-flex-items">
              <label class="lable" for="email">Email</label>
              <input
                class="input"
                type="email"
                name="email"
                id=""
                placeholder="sambh@gmail.com"
                required
              />
            </div>

            <div class="form-flex-items">
              <label class="lable" for="password">Password</label>
              <input
                class="input password"
                type="password"
                name="pass"
                id=""
                placeholder="********"
                required
              />
            </div>

            <div class="form-flex-items">
              <label class="lable" for="password">Confirm Password</label>
              <input
                class="input password-c"
                type="password"
                name="cpass"
                id=""
                placeholder="********"
                required
              />
            </div>

            <button class="btn btn--form" onclick="return validateForm()">Sign Up</button>
            <div class="forgot-password-box">
              <a class="link create-acc" href="http://localhost/sam/login.php"
                >Already have an account?</a
              >
            </div>
          </form>
        </div>
      </div>
    </section>

    <script>
        function validateForm() {
          let x = document.forms["myForm"]["name"].value;
          let y = document.forms["myForm"]["pass"].value;
          let z = document.forms["myForm"]["email"].value;
          if (x.length > 20) {
            alert("Name must be between 4 to 20 characters long");
            document.getElementById("n").value = "";
            return false;
          } else if (x.length < 4) {
            alert("Name must be at more than 4 characters");
            document.getElementById("n").value = "";
            return false;
          } else if (y.length <= 7 || y.length >= 13) {
            alert("Password must be between 8 to 12 characters...");
            document.getElementById("pass").value = "";
            document.getElementById("cpass").value = "";
            return false;
          } else {
            return true;
          }
        }
      </script>
    
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
    
  </body>
</html>