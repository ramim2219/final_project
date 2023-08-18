<?php include 'connection.php'; 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'link.php';?>
</head>
<body>
    <div class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a href="home.php" class="navbar-brand">Home page</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Super admin</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Student</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Teacher</a>
                    </li>
                    <li class="nav-item">
                        <a href="signup.php" class="nav-link">Sign up</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="has-bg-img">
        <img class="bg-img text-center" src="gec_campus.jpg">
    </div>
    <div class="content-box bg-secondary">
        <div class="container pt-3 pb-3">
            <div class="row text-center align-items-center">
                <div class="col-md-2">
                    <i class="fas fa-book-reader fs-3"></i>
                    <h2><span class=" text-center">17</span><span>+</span></h2>
                    <p>Programs</p>
                </div>
                <div class="col-md-2">
                    <i class="fas fa-users fs-3"></i>
                    <h2><span class=" text-center">300</span><span>+</span></h2>
                    <p>Faculty Members</p>
                </div>
                <div class="col-md-2">
                    <i class="fas fa-graduation-cap fs-3"></i>
                    <h2><span class=" text-center">8000</span><span>+</span></h2>
                    <p>Students</p>
                </div>
                <div class="col-md-2">
                    <i class="fas fa-user-graduate fs-3"></i>
                    <h2><span class=" text-center">21000</span><span>+</span></h2>
                    <p>Alumni</p>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-success">Online Admission</button>
                </div>
            </div>
        </div>
    </div>
    <div class="content-box bg-warning bg-gradient">
        <div class="container  pt-3 pb-3">
            <div style="padding-top: 50px"><h3><center><b>Welcome To Premier University</b></center></h3></div>
            <div class="row text-center">
                <div class="col-md-3">
                    <div class="stat-items"><i class="fas fa-university" style="font-size: 150px"></i></div>
                </div>
                <div class="col-md-9">
                    <div style="padding-top: 40px;text-align: justify;line-height: 30px;font-weight: 500">
                        <p>
                            Premier University was first established in the year 2002.
                            According to an international educational survey conducted by Australian government,
                            it recieved a position of "A" category university.It attaches the peramount importance to the quality of education which imparts to the students. Anyone who wants to enrich himself or herself in knowledge is welcome here.
                            The aim is to provide high quality education to the students and at the same time to embue them with the finest qualities of humanism so that they will be ready to sacrifice themselves for the peace and prosperity of humanity.
                            No parochialism, communalism or bigotry will be allowed to play any part in this university.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-box bg-primary bg-opacity-60 text-white">
        <div class="container text-white">
            <div style="padding-top: 20px" class="text-center"><h3><b>Facilities</b></h3></div>
            <hr style="border:black 2px solid;margin: 0px auto" class="mb-4" width="20%">
            <div class="row text-center">
                <div class="col-md-4">
                    <i class="fas fa-wifi fs-1"></i>
                    <h3><span class="text-center">Wifi Facilities</span></h3>
                    <p>Our university has dedicated internet based line connection to all the terminals throughout all our campus located in different locations. Students &amp; faculties are free to access internet at any time.</p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-laptop-code fs-1"></i>
                    <h3><span class="text-center">Lab Facilities</span></h3>
                    <p>The university has several state-of-art computer labs with more than 500 personal computers. These labs are staffed by professional systems managers and lab assistants.</p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-file-signature fs-1"></i>
                    <h3><span class="text-center">Extra Curricular activities</span></h3>
                    <p>The students of premier university are actively involved in different kinds of extra-curricular activities. Students’ participations in Debating Club, Programming Club, Robotics Club, and Cultural Club etc. are very thriving.</p>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['register']))
{
    $_SESSION['role']="Student";
    header('Location: signup.php');
}
?>