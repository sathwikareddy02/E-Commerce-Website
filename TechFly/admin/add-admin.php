<?php include('partials/menu.php');?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Add Admin</h1>

            <form action="" method="POST" >

            <table class="table table-striped">
                
                <tbody>
                    <tr>
                    <th scope="row">Full Name:</th>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                
                    </tr>
                    <tr>
                    <th scope="row">User Name:</th>
                    <td><input type="text" name="username" placeholder="Your Username"></td>
                    </tr>
                    <tr>
                    <th scope="row">Password:</th>
                    <td><input type="password" name="password" placeholder="Your Password"></td>
                    </tr>
                    
                </tbody>
                
            </table>
            <input type="submit" name="submit" value="Add Admin" class="btn btn-success">

            </form>

            <div class="clearfix"></div>
        </div>
    </div>


<?php include('partials/footer.php');?>

<?php
    if(isset($_POST['submit'])){

        //get data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);


        //sql query to save the data into database
        $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username = '$username',
            password = '$password'
        ";
        
        //executing query and saving data inyo database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if($res==TRUE){
            //echo "data inserted";
            //creating a session variable to display message
            $_SESSION['add']="<div class='text-success'>Admin added sucessfully</div>";
            //redirect page to manage admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else{
            //echo "failed";
            //creating a session variable to display message
            $_SESSION['add']="<div class='text-danger'>Failed to add admin</div>";
            //redirect page to add admin
            header("location:".SITEURL.'admin/add-admin.php');
        }

        
    }

?>