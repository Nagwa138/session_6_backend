<?php

session_start();

require '../db.php';

    $user_id = $_GET['user_id'];

    $user_query = mysqli_query($connection, "SELECT * FROM users WHERE id = '$user_id'");
    
    $user = [];
    
    if(mysqli_num_rows($user_query) > 0)
    {
        $user = mysqli_fetch_assoc($user_query);
    }
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <h1 style="text-align:center;margin:30px">
        Edit User Page
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
            <form action="./edit_submit.php" method="post" class="col-6">
                <div class="mb-3">
                    <label for="name" class="form-label">User Name</label>
                    <input type="text" name="username" 
                    value="<?php echo $user['username'] ?>"
                    class="form-control" id="name" placeholder="ex: Ahmed Mohamed">
                </div>

                <input name="user_id" type="hidden" value="<?php echo $user['id'] ?>" >
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" 
                    value="<?php echo $user['phone'] ?>"
                    name="phone" class="form-control" id="phone" placeholder="ex: +201000000">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" class="form-control" id="address" rows="3"><?php echo $user['address'] ?></textarea>
                </div>
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
