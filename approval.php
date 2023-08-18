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
<div class="container">
    <h1>Students</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Role</th>
                <th scope="col">Email</th>
                <th scope="col">Department</th>
                <th scope="col">Approve</th>
                <th scope="col">Disapprove</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $s = "SELECT u.id as id,u.name as name,u.role as role,u.email as email,d.short_name as dept_name from users as u inner join departments as d on u.dept_id = d.id WHERE u.status=0 and u.role='Student'";
                $q=mysqli_query($conn,$s);
                $i=1;
                while($r=mysqli_fetch_array($q))
                {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><?php echo $r['name'] ?></td>
                            <td><?php echo $r['role'] ?></td>
                            <td><?php echo $r['email'] ?></td>
                            <td><?php echo $r['dept_name'] ?></td>
                            <td><a href="approve.php?id=-1&userId=<?php echo $r['id']?>" class="btn btn-success"><i class="fa-solid fa-check"></i></a></td>
                            <td><a href="approve.php?id=-2&userId=<?php echo $r['id']?>" class="btn btn-danger" ><i class="fa-solid fa-xmark"></i></a></td>
                        </tr>
                    <?php
                    $i++;
                }
            ?>
        </tbody>
    </table>
    <h1>Teachers</h1>
    <table class="table table-dark">
        <thead >
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Role</th>
                <th scope="col">Email</th>
                <th scope="col">Department</th>
                <th scope="col">Approve</th>
                <th scope="col">Disapprove</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $s = "SELECT u.id as id,u.name as name,u.role as role,u.email as email,d.short_name as dept_name from users as u inner join departments as d on u.dept_id = d.id WHERE u.status=0 and u.role='Teacher'";
                $q=mysqli_query($conn,$s);
                $i=1;
                while($r=mysqli_fetch_array($q))
                {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><?php echo $r['name'] ?></td>
                            <td><?php echo $r['role'] ?></td>
                            <td><?php echo $r['email'] ?></td>
                            <td><?php echo $r['dept_name'] ?></td>
                            <td><a href="approve.php?id=-1&userId=<?php echo $r['id']?>" class="btn btn-success"><i class="fa-solid fa-check"></i></a></td>
                            <td><a href="approve.php?id=-2&userId=<?php echo $r['id']?>" class="btn btn-danger" ><i class="fa-solid fa-xmark"></i></a></td>
                        </tr>
                    <?php
                    $i++;
                }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>