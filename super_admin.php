<?php 
    include 'connection.php';
    session_start();
    if(!isset($_SESSION['name']))
    {
        header('Location: login.php');
    }
    else if($_SESSION['role']=="Student")
    {
        header('Location: student.php');
    }
    else if($_SESSION['role']=="Admin")
    {
        header('Location: admin.php');
    }
    else if($_SESSION['role']=="Teacher")
    {
        header('Location: teacher.php');
    }
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <?php include 'link.php'?>
</head>
<body>
<div class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a href="" class="navbar-brand">Super Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="home.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="login.php" class="nav-link">Log in</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Create</a>
                    <ul class="dropdown-menu">
                        <li><a href="create_dept.php" class="dropdown-item">Departments</a></li>
                        <li><a href="signup.php" class="dropdown-item">Admin</a></li>
                        <li><a href="signup.php" class="dropdown-item">Student</a></li>
                        <li><a href="signup.php" class="dropdown-item">Teacher</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="row bg-light">
    <?php
        $u_id=$_SESSION['id'];
        $s="SELECT name,role,email,image FROM `users` WHERE id='$u_id'";
        $r=mysqli_query($conn,$s);
        while($q=mysqli_fetch_array($r))
        {
            ?>
            <section class="vh-100" style="background-color: #f4f5f7;">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col col-lg-6 mb-4 mb-lg-0">
                            <div class="card mb-3" style="border-radius: .5rem;">
                                <div class="row g-0">
                                    <div class="col-md-4 gradient-custom text-center text-white"
                                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                        <img src="<?php echo $q['image']?>"
                                            alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                        <h5 class="text-dark"><?php echo $q['name']?></h5>
                                        <p class="text-dark"><?php echo $q['role']?></p>
                                        <i class="far fa-edit mb-5"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body p-4">
                                            <h6>Information</h6>
                                            <hr class="mt-0 mb-4">
                                            <div class="row pt-1">
                                                <div class="col-12 mb-3">
                                                    <h6>Email</h6>
                                                    <p class="text-muted"><?php echo $q['email']?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }
    ?>
</div>
</body>
</html>