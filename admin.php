<?php 
    include 'connection.php';
    session_start();
    if(!isset($_SESSION['name']))
    {
        header('Location: login.php');
    }
    else if($_SESSION['role']=="Teacher")
    {
        header('Location: teacher.php');
    }
    else if($_SESSION['role']=="Student")
    {
        header('Location: student.php');
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
<?php include 'admin_nav.php' ?>
<div class="row bg-light">
    <?php
        $u_id=$_SESSION['id'];
        $s="SELECT u.name as name,u.role as role,u.email as email,u.image as image,d.full_name as dept_name from users as u inner join departments as d on u.dept_id = d.id WHERE u.id='$u_id'";
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
                                                <div class="col-12 mb-3">
                                                    <h6>Department name</h6>
                                                    <p class="text-muted"><?php echo $q['dept_name'] ?></p>
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