<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Genuine Connect : Contact Us</title>
		<?php include("include/header_include.php"); ?>
		<?php 
			include("process/authenticationMgt.php");
			include("process/userMgt.php");
			$objAuthProcess = new authenticationProcessor();
			$name="";
			$phone="";
			$email="";
			$status="";
				if(!$objAuthProcess->isLogedIn()){
					$user=$objAuthProcess -> logedinUserDetails();
					$status="1";
					//require_once("process/userMgt.php");
					//$objUserProcess = new userLoginProcessor();
					//$objuserdetail=$objUserProcess->getUserDetails($user["userID"],$arrDBTaskManagement);
					
				}
			
			
		?>
</head>

<body>
<div class="Container">
	<div class="header">
		<?php include("include/header.php"); ?>
	</div>
	<div class="middle contactForm">
		<div class="left formInter">
			<iframe name="submitForm" id="submitForm"></iframe>
					<div class="blockDetail active">
							<div class="formWraper">
							<h3>Write To Us</h3>
							<form name="contactForm" id="contactForm" method="post" action="bridges/contacts/func_addEnquery.php"  target="#submitForm" >
							    <div class="formRow"><label for="genContName">Name</label></div>
							    <div class="formRow"><input type="text" name="genContName" id="genContName" maxlength="200" readonly="<?php echo ($status == '1')?"true":"false"; ?>" value="<?php echo $name ?>"></div>
								<div class="formRow"><label for="genContPhone">Phone</label></div>
								<div class="formRow"><input type="text" name="genContPhone" id="genContPhone" maxlength="200" readonly="<?php echo ($status == '1')?"true":"false"; ?>" value="<?php echo $phone ?>"></div>
								<div class="formRow"><label for="genContEmail">Email <span class="opt">(optional)</span></label></div>
								<div class="formRow"><input type="text" name="genContEmail" id="genContEmail" maxlength="200" readonly="<?php echo ($status == '1')?"true":"false"; ?>" value="<?php echo $email ?>"></div>
								<div class="formRow"><label for="genContTitle">Title </label></div>
								<div class="formRow"><input type="text" name="genContTitle" id="genContTitle" maxlength="300"></div>
								<div class="formRow"><label for="genUserPass">Subject</label></div>
								<div class="formRow"><textarea cols="35" rows="7" name="genContSub" id="genContSub"></textarea></div>								
								<div class="formRow"></div>								
								<div class="formRow">
									<input type="hidden" name="formsubmit" id="formsubmit" value="1">
									<input type="submit" name="genContSubmit" id="genContSubmit" value="Send" />
								</div>
								<div class="formRow"></div>
							</form>
							</div>
					</div>
		</div>
		<div class="right">
			<p class="font3"><span class="apost">"</span>Every body Can be a service provider or Every body can be a service user<span class="apost">"</span></p>
		</div>
	</div>
	<div class="footer">
			<?php include("include/footer.php"); ?>
	</div>
</div>
</body>
</html>
