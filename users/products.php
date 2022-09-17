<?php

require '../db.php';

$user_id = $_GET['user_id'];

// get user data

$user_products_query = mysqli_query($connection, 
"SELECT users.username, products.id, products.product_name, products.product_image FROM users INNER JOIN products ON users.id = products.user_id
 WHERE users.id = '$user_id'");

$products = [];

if(mysqli_num_rows($user_products_query) > 0)
{
    while($product = mysqli_fetch_assoc($user_products_query))
    {
        $products[] = $product;
    }
}

$user_name = $products[0]['username'];

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
        Products Page of User : <?php echo $user_name;?>
    </h1>

    <div class="container">
        <div class="row justify-content-end">
            <a href="" class="btn btn-primary col-2 m-2">
                Add Product
            </a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Image</th>
                <th scope="col">User</th>
                </tr>
            </thead>
            <tbody>
            <?php

                foreach($products as $product)
                {
                    echo "<tr>";
                    echo "<th>{$product['id']}</th>";
                    echo "<td>{$product['product_name']}</td>";
                    echo "<td>{$product['product_image']}</td>";
                    echo "<td> <a class='btn btn-warning' href='show.php?user_id=".$user_id."'> View </a> </td>";
                    echo "</tr>";
                }

            ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

</body>
</html>
