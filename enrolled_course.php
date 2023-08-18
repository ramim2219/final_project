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
        <a href="student.php" class="navbar-brand">Student</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="home.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="enroll.php" class="nav-link">Enrollment</a>
                </li>
                <li class="nav-item">
                    <a href="enrolled_course.php" class="nav-link">Enrolled courses</a>
                </li>
                <li class="nav-item">
                    <a href="project_idea.php" class="nav-link">project_idea</a>
                </li>
                <li class="nav-item">
                    <a href="stdnt_inbox.php" class="nav-link">inbox</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Course code</th>
                <th scope="col">Course title</th>
                <th scope="col">Course credit</th>
                <th scope="col">Course type</th>
                <th scope="col">Course status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $u_id=$_SESSION['id'];
                $str="Select c.course_code,c.course_title,c.course_credit,e.status,e.type from enrollment as e inner join courses as c on e.course_id=c.id inner join users as u on e.stdnt_id=u.id where e.stdnt_id='$u_id'";
                $q=mysqli_query($conn,$str);
                $cnt=0;
                while($r=mysqli_fetch_array($q))
                {
                    $cnt+=$r['course_credit'];
                    ?>
                        <tr>
                            <td scope="col">#</th>
                            <td scope="col"><?php echo $r['course_code'] ?></th>
                            <td scope="col"><?php echo $r['course_title'] ?></th>
                            <td scope="col"><?php echo $r['course_credit'] ?></th>
                            <td scope="col"><?php echo $r['type'] ?></th>
                            <td scope="col">
                                <?php
                                    if($r['status']==0)echo "Running";
                                    else echo "Completed";
                                ?>
                            </th>
                        </tr>
                    <?php
                }
                ?>
                <tr>
                    <th scope="col">#</th>
                    <th colspan="2" class="text-center">Total credits</th>
                    <th scope="col"><?php echo $cnt ?></th>
                </tr>
                <?php
            ?>
        </tbody>
    </table>
</div>
</body>
</html>

