<?php include('../config/constants.php');?>

<html>
    <head>
        <title>Login - TechFly</title>
        <link rel="stylesheet" href="../css/admin.css">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body>

    <div class="login">
        <h1 class="text-centre">Login</h1>
        <?php
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

            if(isset($_SESSION['no-login-message'])){
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
        ?>
        <br>
        
        <form action="" method="POST" class="text-centre">
            Username:
            <input type="text" name="username" placeholder="Enter Username"><br><br>
            Password:
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn btn-primary"><br><br>

            

        </form>

        <p class="text-centre">Created By - <a href="https://github.com/sathwikareddy02" target="_blank">Sathwika Reddy</a></p>

    </div>
    </body>
</html>

<?php 



    //check whether the submit button is clicked or not
    if(isset($_POST['submit'])){
        //process for login
        //get the data from login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //sql to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //execute the query
        $res = mysqli_query($conn , $sql);

        //count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1){

            $_SESSION['login'] = "<div class='text-centre text-success>Login Succesful.</div>";
            $_SESSION['user'] = $username;

            //redirect to home page/dashboard
            header('location:'.SITEURL.'admin/index.php');
        }
        else{
            $_SESSION['login']= "<div class='text-centre text-danger'>Username or Password did not match.</div>";
            //redirect
            header('location:'.SITEURL.'admin/login.php');
        }
        
    }
?>