<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(adminavatar.jpg);"></a>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">USERS</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                <a href="teacherupdate.php?id=<?php   echo $_SESSION['LoginUser'];?>">Update Profile </a>
                </li>
                <li>
                    <a href="#">Teachers</a>
                </li>
                <li>
                    <a href="#">Students</a>
                </li>
	            </ul>
	          </li>
	         
	          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Academic</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="schedule\viewschedule.php">Academic Calender</a>
                </li>
                <li>
                    <a href="material_upload\index.php">Material Upload</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
              </ul>
	          </li>
	          <li>
              <a href="teacherleave.php?id=<?php   echo $_SESSION['LoginUser'];?> `">Leave</a>
	          </li>

	          <li>
              <a href="#assignmet" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Assignment</a>
              <ul class="collapse list-unstyled" id="assignment">
                <li>
                    <a href="">Assignment Scheduler</a>
                </li>
                <li>
                    <a href="">Material Upload  </a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
              </ul>
	          </li>

	          <li>
            <a href="#testmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tools</a>
              <ul class="collapse list-unstyled" id="testmenu">
                <li>
                    <a href="OCR\index.html">OCR</a>
                </li>
                <li>
                    <a href="spell-checker\index.html">Spell Checker</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
              </ul>
	          </li>
	        </ul>

	        <div class="footer">
	        	<p></p>
	        </div>

	      </div>
    	</nav>