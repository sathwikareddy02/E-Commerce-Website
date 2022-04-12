<?php

    //include constants
    include('../config/constants.php');
    //get id
    $id = $_GET['id'];

    //create sql query to delete admin

    $sql = "DELETE FROM tbl_admin WHERE id=$id";
    //execute the query

    $res= mysqli_query($conn, $sql);
    //check whether query executed or not
    if($res==true){
        //create session variable to display message
        $_SESSION['delete']="Admin deleted sucessfully";

        //redirect to manage-admin

        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else{
        $_SESSION['delete']="Failed to delete admin. Try again later.";
        header("location:".SITEURL.'admin/manage-admin.php');
    }

    //redirect to manage admin page with message




?>