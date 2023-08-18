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
    else if($_SESSION['role']=="Super Admin")
    {
        header('Location: super_admin.php');
    }
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <?php include 'link.php'?>
</head>
<body>
<?php
if($_SESSION['status']==0)
{
    ?>
        <div class="d-flex justify-content-center align-items-center vh-100">
            <h1 class="text-danger">You are not approved Yet!</h1>
        </div>
    <?php
}
else
{ 
    ?>
    <div class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a href="" class="navbar-brand">Teacher</a>
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
    <?php
}
?>
<div class="container vh-100 d-flex align-items-center">
    <div class="row bg-light">
        <?php
            $u_id=$_SESSION['id'];
            $s="SELECT u.name as name,u.role as role,u.email as email,u.image as image,d.full_name as dept_name from users as u inner join departments as d on u.dept_id = d.id WHERE u.id='$u_id'";
            $r=mysqli_query($conn,$s);
            while($q=mysqli_fetch_array($r))
            {
                ?>
                <div class="col-md-5">
                        <div class="d-flex justify-content-center">
                                <img src="<?php echo $q['image']?>" style="width:250px;height:300px;">
                        </div>
                        <h5 class="text-center"><?php echo $q['role']?></h5>
                </div>
                <div class="col-md-7">
                    <h1>Information</h1>
                    <div>
                        <span class="h6">Name : </span><span><?php echo $q['name']?></span>
                    </div>
                    <div>
                        <span class="h6">Email : </span><span><?php echo $q['email']?></span>
                    </div>
                    <div>
                        <span class="h6">Department : </span><span><?php echo $q['dept_name'] ?></span>
                    </div>
                </div>
                <?php
            }
        ?>
        
    </div>
</div>
</body>
</html>