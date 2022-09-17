<?php


require '../db.php';

session_start();

if(!empty($_POST))
{
    $category_name = $_POST['category_name'];

    if(strlen($category_name) < 1)
    {
        $_SESSION['error'] = "Sorry, Category name required!";
        $_SESSION['success'] = null;
        header('location: create.php');
        exit();
    }

    $category_create_query = mysqli_query($connection, 
    "INSERT INTO categories (category) VALUES ('$category_name')");

    if($category_create_query)
    {
        $_SESSION['success'] = "Category was added Successfully!";
        $_SESSION['error'] = null;
    } else {
        $_SESSION['success'] = null;
        $_SESSION['error'] = 'Error occurred!';
    }

}
    header('location: index.php');
    exit();