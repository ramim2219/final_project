<?php 
include 'connection.php'; 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'link.php'?>
</head>
<body>
    <div class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a href="" class="navbar-brand">Sign up page</a>
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
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="text-center">
            <img src="logo.png"
                style="width: 185px;" alt="logo">
            <h4 class="mt-1 mb-3">Welcome to Premier University</h4>
        </div>
        <h2>Register Here</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group mb-2">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" id="">
            </div>
            <div class="form-group mb-2">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" id="">
            </div>
            <div class="form-group mb-2">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" id="">
            </div>
            <div class="form-group mb-2">
                <label for="">Department</label>
                <select name="dept_name" id="" class="form-control">
                    <option value="">Department</option>
                    <?php 
                        $str = "SELECT * FROM `departments`;";
                        $q = mysqli_query($conn,$str);
                        while($r=mysqli_fetch_array($q))
                        {
                            ?>
                                <option value="<?php echo $r['id'] ?>"><?php echo $r['full_name'] ?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="">Confirm Password</label>
                <input type="password" name="cnf_password" class="form-control" id="">
            </div>
            <div class="form-group mb-2">
                <label for="">Role</label>
                <select name="role" id="" class="form-control">
                    <?php
                        if($_SESSION['role']=="Super Admin")
                        {
                            ?>
                                <option value="">Select Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Student">Student</option>
                                <option value="Teacher">Teacher</option>
                            <?php
                        } 
                        else
                        {
                            ?>
                                <option value="">Select Role</option>
                                <option value="Student">Student</option>
                                <option value="Teacher">Teacher</option>
                            <?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="">images</label>
                <input type="file" name="f1" class="form-control" id="">
            </div>
            <div class="form-group mb-2">
                <button type="submit" class="btn btn-primary" name="submitBtn">Ragister</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php 
    if(isset($_POST['submitBtn']))
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        /* check email */
        $s="select * from users where email Like '$email'";
        $q=mysqli_query($conn,$s);
        if(mysqli_fetch_assoc($q))
        {
            ?>
                <script>alert("Please change your email")</script>
            <?php
        }
        else
        {
            $password = $_POST["password"];
            $cnf_password = $_POST["cnf_password"];
            $role = $_POST["role"];
            $dept_name = $_POST["dept_name"];
            $file = $_FILES['f1'];
            $filename = $file['name'];
            $filepath = $file['tmp_name'];
            $fileerror = $file['error'];
            if($password == $cnf_password && $fileerror==0)
            {
                $destfile = 'upload/'.$filename;
                move_uploaded_file($filepath,$destfile);
                if($_SESSION['role']=="Super Admin")
                {
                    $str = "INSERT INTO `users`(name, role, dept_id,email,password,status,image) VALUES ('$name','$role','$dept_name','$email','".md5($password)."',1,'$destfile')";
                    header('Location: super_admin.php');
                }
                else if($_SESSION['role']=="Admin")
                {
                    $str = "INSERT INTO `users`(name, role, dept_id,email,password,status,image) VALUES ('$name','$role','$dept_name','$email','".md5($password)."',1,'$destfile')";
                    header('Location: admin.php');
                }
                else
                {
                    $str = "INSERT INTO `users`(name, role, dept_id,email,password,image) VALUES ('$name','$role','$dept_name','$email','".md5($password)."','$destfile')";
                }
                mysqli_query($conn,$str);
            }
            else
            {
                echo 'Password Mismatch';
            }
        }
    }
?>