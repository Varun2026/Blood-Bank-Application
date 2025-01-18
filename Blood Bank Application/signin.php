<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT * FROM donors WHERE username='$username' AND password='$password'";
    $result = $db->query($sql);

    if ($result->num_rows == 1) {
        echo "<script>
                alert('Login successful!');
                window.location.href='index.html'; 
              </script>";
    } else {
        echo "<script>
                alert('Invalid username or password!');
                window.location.href='signin.php';
              </script>";
    }

    $db->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .gradient-custom-2 {
            background: linear-gradient(to right, rgb(155, 47, 47), rgb(195, 132, 113));
            height: 100vh;
        }
    </style>
</head>
<body>
    <section class="gradient-custom-2 d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-lg" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h3 class="mb-4 text-center">Sign In</h3>
                            <form action="signin.php" method="post">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" required />
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required />
                                </div>
                                <button type="submit" class="btn btn-danger w-100">Sign In</button>
                            </form>
                            <div class="text-center mt-3">
                                <p>Don't have an account? <a href="signup.html" class="text-danger">Sign Up</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
