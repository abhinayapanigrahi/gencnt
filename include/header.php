<div class="headContainer">
	<div class="logo">
		<a href="index.php"><img src="images/logo.jpg" alt="Site Logo" border="0" /></a>
	</div>
	<div class="topmenu">
		<ul>
			<li><a href="index.php" class="active">Home</a></li>
			<li><a href="contactus.php">Contact Us</a></li>
			<?php
				if(isset($_COOKIE['userName']) && !empty($_COOKIE['userName'])){
					?>
					<li><a href="services.php">Services</a></li>
					<?php
					if(isset($_COOKIE['designation']) && $_COOKIE['designation'] == 1){
					?>
					<li><a href="manageMasters.php">Manage Masters</a></li>
					<?php
					}					
					?>
					<li class="userStatus"><a href="profile.php">Welcome <?php echo $_COOKIE['userName']; ?> <span class="screen-reader-only"> click to edit your Profile</span></a></li>
					<li><a href="bridges/userLogin/func_logOut.php">LogOut</a></li>
					<?php
				}else{
					?>
					<li class="userStatus"><a href="login.php">Login</a></li>					
					<?php
				}
			?>
		</ul>
		<div class="hidden">Om Gurubhyo Namaha<br/>
Om Ganeshaya Namaha<br/>
Om Kula Devatabhyo Namaha<br/>
Om Ishta Devatabhyo Namaha<br/>
OM Pitra Devtabhyo Namaha<br/>
Om Mata Pitribhyam Namaha</div>
	</div>
	<div class="clearall"></div>
</div>
<div class="leftShadow"></div>
<div class="rightShadow"></div>		