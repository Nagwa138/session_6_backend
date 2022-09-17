<?php

// select categories

require '../db.php';

session_start();

$categories_query = mysqli_query($connection, "SELECT * FROM categories");

$categories = [];

if(mysqli_num_rows($categories_query) > 0)
{
    while($data = mysqli_fetch_assoc($categories_query))
    {
        $categories[] = $data;
    }
}

$users_query = mysqli_query($connection, "SELECT * FROM users");

$users = [];

if(mysqli_num_rows($users_query) > 0)
{
    while($data = mysqli_fetch_assoc($users_query))
    {
        $users[] = $data;
    }
}

// choose rom catgories


// upload image for product


// save the dota 


// show data 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <h1 style="text-align:center;margin:30px">
        Create Product Page
    </h1>

    <div class="container">
        <?php

            if(isset($_SESSION['error']) && !is_null($_SESSION['error']))
                {
            ?>
            <div class="row justify-content-center">
                <div class="alert alert-danger col-6 ">
                    <?php echo $_SESSION['error']; ?>
                </div>
            </div>
            <?php
                }
            ?>
            
        <div class="row justify-content-center">
            <form action="./create_submit.php" method="post" class="col-6" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" name="product_name" class="form-control" id="product_name"
                     placeholder="ex: Clothes one">
                </div>

                <div class="input-group mb-3">
                    <input type="file" name="image" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>

                <?php

                    foreach($categories as $category)
                    {
                        ?>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="<?php echo $category['id']?>"
                     name="categories[]" id="cat-<?php echo $category['id']?>">
                    <label class="form-check-label" for="cat-<?php echo $category['id']?>">
                        <?php echo $category['category']  ?>
                    </label>
                </div>
               
                <?php
                    }
                ?>



<select class="form-select" name="user_id" aria-label="Default select example">

                <?php
        
        foreach($users as $user)
                    {
                        ?>
            <option value="<?php echo $user['id'] ?>"><?php echo $user['username'] ?></option>
               <?php

                    }

                    ?>

</select>
                <button type="submit" class="btn btn-success col-12">
                    Save
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

</body>
</html>
