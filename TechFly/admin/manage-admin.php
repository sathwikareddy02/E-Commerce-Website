<?php include('partials/menu.php'); ?>

        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>
                <br/>
                <?php 
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']); //removing session message
                    }

                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                <br/>
                <p>
                    <a class="btn btn-primary" href="add-admin.php" role="button">Add Admin</a>
                </p>

                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM tbl_admin";
                            $res = mysqli_query($conn, $sql);
                            
                            //check whether the query is executed or not
                            if($res==TRUE){
                                //count rows to check whether we have data in database or not
                                $count= mysqli_num_rows($res); //function to get all the rows in database
                                //check the number of rows
                                if($count>0){
                                    $temp=1;
                                    while($rows=mysqli_fetch_assoc($res)){
                                        //getting individual data
                                        $id=$rows['id'];
                                        $full_name=$rows['full_name'];
                                        $user_name=$rows['username'];

                                        //display the values in our table

                                        ?>
                                        <tr>
                                            
                                            <td scope="row"> <?php echo $temp;?> </td>
                                            <td><?php echo $full_name;?></td>
                                            <td><?php echo $user_name;?></td>
                                            <td>
                                                <a class="btn btn-success btn-sm" href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" role="button">Update Admin</a>
                                                <a class="btn btn-danger btn-sm" href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" role="button">Delete Admin</button>                
                                            </td>
                                        </tr>

                                        <?php
                                        $temp++;;
                                    }
                                }
                                else{

                                }
                            }
                        ?>
                        
                    </tbody>
                </table>

                
                <div class="clearfix"></div>
            </div>
        </div>

<?php include('partials/footer.php');?>