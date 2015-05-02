<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Genuine Connect : Services</title>
<?php include("include/header_include.php"); 
				
				include("process/authenticationMgt.php");
				include("process/servicesMgt.php");
				
				$objAuth = new authenticationProcessor();
				if(!$objAuth->isLogedIn()){
					header("Location: bridges/userLogin/func_logOut.php");
				}
		?>
</head>

<body>
<div class="Container">
	<div class="header">
		<?php include("include/header.php"); ?>
	</div>
	<div class="middle mastersMgt">
			<?php
			if(isset($_REQUEST['mpg'])){
					$pgMod = $_REQUEST['mpg'];
					switch($pgMod){
						case "cnt":
						$page = "countries.php";
						break;
						case "stt":
						$page = "states.php";
						break;
						case "ara":
						$page = "areas.php";
						break;
						case "lng":
						$page = "languages.php";
						break;
						default:
						$pgMod = "dflt";
						$page = "default.php";						
						break;
					}
				}else{
				$pgMod = "dflt";
				$page = "default.php";
				}
			?>
		<div class="leftMenu">
			<ul class="leftMenue">
				<li class="<?php echo ($pgMod == "dflt")?"active":""; ?>"><a href="manageMasters.php">Dashboard</a></li>
				<li class="<?php echo ($pgMod == "cnt")?"active":""; ?>"><a href="manageMasters.php?mpg=cnt">Country Management</a></li>
				<li class="<?php echo ($pgMod == "stt")?"active":""; ?>"><a href="manageMasters.php?mpg=stt">State Management</a></li>
				<li class="<?php echo ($pgMod == "ara")?"active":""; ?>"><a href="manageMasters.php?mpg=ara">Area Management</a></li>
				<li class="<?php echo ($pgMod == "lng")?"active":""; ?>"><a href="manageMasters.php?mpg=lng">Language List Management</a></li>				
			</ul>
		</div>
		<div class="pageContent">
			<?php require($page); ?>
		</div>
	</div>
	<div class="footer">
			<?php include("include/footer.php"); ?>
	</div>
</div>
</body>
</html>
