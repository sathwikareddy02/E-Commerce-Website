<?php include('partials/menu.php');?>



    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Category</h1>
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
            <p>
                <a class="btn btn-primary" href="add-category.php" role="button">Add Category</a>
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
                    </tbady>
            </table>
        </div>
    </div>
<?php include('partials/footer.php');?>