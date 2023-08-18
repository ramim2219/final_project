<?php 
    include 'connection.php';
    session_start();
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
<div class="container">
    <form action="" method="post">
        <h1>Create Department</h1>
        <div class="form-group">
            <label for="">Short name</label>
            <input type="text" name="short_name" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Full name</label>
            <input type="text" name="full_name" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Building</label>
            <input type="text" name="building" class="form-control" id="">
        </div>
        <div class="form-group mb-2">
            <label for="">Budget</label>
            <input type="text" name="budget" class="form-control" id="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submitBtn">Save</button>
        </div>
    </form>
</div>
</body>
</html>
<?php
    if(isset($_POST['submitBtn'])){
        $short_name = $_POST["short_name"];
        $full_name = $_POST["full_name"];
        $building = $_POST["building"];
        $budget = $_POST["budget"];
        $str = "INSERT INTO `departments`(`short_name`, `full_name`, `building`, `Budget`) VALUES ('$short_name','$full_name','$building','$budget')";
        mysqli_query($conn,$str);
    }
?>