<div class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a href="admin.php" class="navbar-brand">Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="home.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="approval.php" class="nav-link">Approval</a>
                </li>
                <li class="nav-item">
                    <a href="all_users_info.php" class="nav-link">All users</a>
                </li>
                <li class="nav-item">
                    <a href="courses_form.php?userId=-3" class="nav-link">Courses</a>
                </li>
                <li class="nav-item">
                    <a href="sessions.php?userId=-3" class="nav-link">Sessions</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Create</a>
                    <ul class="dropdown-menu">
                        <li><a href="courses_form.php?userId=-1" class="dropdown-item">Courses</a></li>
                        <li><a href="sessions.php?userId=-1" class="dropdown-item">Sessions</a></li>
                        <li><a href="signup.php" class="dropdown-item">Student</a></li>
                        <li><a href="signup.php" class="dropdown-item">Teacher</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>