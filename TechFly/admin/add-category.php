<?php 
    include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>

        <?php 
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="table table-striped">
                <tbody>
                    <tr>
                    <th scope="row">Title:</th>
                    <td><input type="text" name="title" placeholder="Category Title"></td>
                
                    </tr>
                    <tr>
                    <th scope="row">Select Image:</th>
                    <td><input type="file" name="image"></td>
                
                    </tr>
                    <tr>
                    <th scope="row">Featured:</th>
                    <td><input type="radio" name="featured" value="Yes"> Yes
                    <input type="radio" name="featured" value="No"> No
                    </td>
                    </tr>

                    <tr>
                    <th scope="row">Active:</th>
                    <td><input type="radio" name="active" value="Yes"> Yes
                    <input type="radio" name="active" value="No"> No
                    </td>
                    </tr>
                    
                    
                </tbody>
            </table>
            <input type="submit" name="submit" value="Add Category" class="btn btn-success">
        </form>


        <?php

            if(isset($_POST['submit'])){
                $title = $_POST['title'];
                //check if submit button is clicked or not
                if(isset($_POST['submit'])){
    
                    //get the values from form
                    $featured = $_POST['featured'];
                }
                else{
                    //set the default value
                    $featured = "No";
                }

                if(isset($_POST['active'])){
                    $active = $_POST['active'];
                }
                else{
                    $active = "No";
                }

                //check whether image is selected or not and set the value for image name accordingly

                

                if(isset($_FILES['image']['name'])){

                    //to upload the imahe we need image name, source path and destination path

                    $image_name = $_FILES['image']['name'];

                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "../images/category/".$image_name;

                    $upload = move_uploaded_file($source_path, $destination_path);

                    //check whether the image is uploaded or not

                    if($upload==false){
                        //set message
                        $_SESSION['upload']="<div class='error'>Failed to upload image. </div>";
                        //redirect to add category page

                        header('location:'.SITEURL.'admin/add-category.php');

                        //stop the process
                        

                    }
                }
                else{
                    //dont upload image and set image_name value as blank

                    $image_name="not";
                }

                //create sql query to insert category into database
                $sql = "INSERT INTO tbl_category SET
                title= '$title',
                image_name='$image_name',
                featured= '$featured',
                active= '$active'
                ";

                //execute the query and save in database
                $res = mysqli_query($conn,$sql);

                //check whether the query execute or not for data added or not
                if($res==true){
                    //query executed and data added
                    $_SESSION['add']="<div class='text-success'>Category added sucessfully</div>";
                    //redirect to manage category page
                    header("location:".SITEURL.'admin/manage-category.php');
                }
                else{
                    //failed to add category
                    $_SESSION['add']="<div class='text-danger'>Failed to add category</div>";
                    //redirect to add category page
                    header("location:".SITEURL.'admin/add-category.php');
                }

            }
        ?>

    </div>
</div>

<?php include('partials/footer.php');?>