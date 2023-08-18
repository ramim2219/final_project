<?php include 'connection.php'; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'link.php'?>
</head>
<body>
    <div class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a href="" class="navbar-brand">Login page</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="home.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="signup.php" class="nav-link">Sign up</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-12">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <img src="logo.png"
                                            style="width: 185px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">Welcome to Premier University</h4>
                                    </div>
                                    <div class="container">
                                        <p>Please login to your account</p>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" name="email" class="form-control" id="email" placeholder="Enter your email address">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="">Password</label>
                                                <input type="password" name="password" class="form-control" id="">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="loginBtn" class="btn btn-primary">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<?php 
    if(isset($_POST['loginBtn'])){
        /* for super admin */
        $email = $_POST['email'];
        $password = $_POST['password'];
        $s = "select * from users where email='".$email."' 
        and password='".md5($password)."'";
        $q = mysqli_query($conn, $s);
        $r=mysqli_fetch_assoc($q);
        if($r)
        {
            $_SESSION['id']=$r['id'];
            $_SESSION['status']=$r['status'];
            $_SESSION['name'] = $r['name'];
            $_SESSION['role'] = $r['role'];
            if($r['role']=="Super Admin")
            {
                header('Location: super_admin.php');
            }
            else if($r['role']=="Admin")
            {
                header('Location: admin.php');
            }
            else if($r['role']=="Teacher")
            {
                header('Location: teacher.php');
            }
            else if($r['role']=="Student")
            {
                header('Location: student.php');
            }
        }
        else
        {
            header("Location: login.php");
        }
    }
?>