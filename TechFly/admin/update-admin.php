<?php include('partials/menu.php');?>

<div class="main-content">
        <div class="wrapper">
            <h1>Update Admin</h1>

            <?php 
                //get id of selected admin
                $id =$_GET['id'];
                //sql to get details
                $sql="SELECT * FROM tbl_admin WHERE id=$id";
                //execute the query
                $res=mysqli_query($conn,$sql);

                if($res==true){
                    $count=mysqli_num_rows($res);

                    if($count==1){
                        $row = mysqli_fetch_assoc($res);
                        $full_name = $row['full_name'];
                        $username = $row['username'];
                    }
                    else{
                        header("location:".SITEURL.'admin/manage-admin.php');
                    }
                }
                
                
            ?>

            <form action="" method="POST" >

            <table class="table table-striped">
                
                <tbody>
                    <tr>
                    <th scope="row">Full Name:</th>
                    <td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
                
                    </tr>
                    <tr>
                    <th scope="row">User Name:</th>
                    <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                    </tr>
                    
                    
                </tbody>
                
            </table>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Update Admin" class="btn btn-success">

            </form>

            <div class="clearfix"></div>
        </div>
</div>

<?php
    if(isset($_POST['submit'])){
         
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        $sql = "UPDATE tbl_admin SET
        full_name = '$full_name',
        username = '$username'
        WHERE id='$id'
        ";

        $res = mysqli_query($conn, $sql);

        if($res==true){
            $_SESSION['update'] = "<div class='success'>Admin updated succesfully.</div>";
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else{
            $_SESSION['update'] = "<div class='success'>Failed to update admin.</div>";
            header("location:".SITEURL.'admin/manage-admin.php');
        }

    }
?>

<?php include('partials/footer.php');?>