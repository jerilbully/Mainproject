<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(adminavatar.jpg);"></a>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">USERS</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="studentupdate.php?id=<?php   echo $_SESSION['LoginUser'];?>">Update Profile </a>
                </li>
                
                <li>
                    <a href="#">Test</a>
                </li>
	            </ul>
	          </li>
	          <li>
	              <a href="#">About</a>
	          </li>
	          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Course</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
              <li>
                    <a href="studentcourse.php?id=<?php echo $_SESSION['LoginUser'];?>">Your Course</a>
                </li>
                <li>
                    <a href="studentassign.php?id=<?php echo $_SESSION['LoginUser'];?>">Assignments</a>
                </li>
                <li>
                    <a href="viewtimetable.php?id=<?php echo $_SESSION['LoginUser'];?>">TimeTable</a>
                </li>
                
              </ul>
	          </li>
	          <li>
              <a href="viewmmark.php?id=<?php echo $_SESSION['LoginUser'];?>">Marks</a>
	          </li>
	          <li>
              <a href="#">test</a>
	          </li>
	        </ul>

	        <div class="footer">
	        	<p></p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/smartacademy/login.php">LOGOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
              </ul>
            </div>
          </div>
        </nav>