<?php
    include 'dbconn.php'; // Adjust path as needed
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register your Account</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
 
<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card p-5">
        <form method="POST" action="functions/add.php">
            <h1 class="text-center mb-5">Create your Account</h1>

            <div class="row">
                <div class="col-12">
                    <label for="user_name">Fullname</label>
                    <input class="form-control my-1" type="text" name="user_name" placeholder="Enter Fullname" required>

                    <label for="user_pass">Password</label>
                    <input class="form-control my-1" type="password" name="user_pass" placeholder="Enter Password" required>
                </div>
                <div class="col-12">
                    <label for="user_email">Email</label>
                    <input class="form-control my-1" type="email" name="user_email" placeholder="Enter Email" required>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary rounded-pill w-50 my-5">Submit</button>
            </div>
        </form>
        <a href="index.php" class="text-center my-2">Login account</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>