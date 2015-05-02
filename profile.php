<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Genuine Connect : Profile</title>
<?php include("include/header_include.php"); 
				
				include("process/authenticationMgt.php");
				include("objectManagers/userManager.php");
				include("process/userProfileMgt.php");
				include("process/languageUserMapMgt.php");
				
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
	<div class="middleWrapper">
<?php  
	
	$userProfileObj		=	new userProfileProcessor();
	$resProfile			=	$userProfileObj->getUserDetailsById($arrDBTaskManagement);
	$resProLanguage		=	$userProfileObj->getUserLanguageMap($arrDBTaskManagement);
	
		$userlanguageList			=	array();
		while($objProfileLang = mysql_fetch_object($resProLanguage)){
			array_push($userlanguageList,$objProfileLang->lid);
		}
		$objProfileDetails = mysql_fetch_object($resProfile)
					
?>

							<form name="loginUser" id="loginUser" method="post" action="bridges/users/func_editUserProfile.php" onsubmit="return profileform_validation(this);">
								<div class="profileUserDetail leftBlock">
									<div class="formRow"><label for="genUserName">User Name</label></div>
									<div class="formRow"><input type="text" name="genUserName" id="genUserName" readonly="readonly" disabled="disabled" value="<?php echo $objProfileDetails->user_name;?>"/></div>
									<div class="formRow"><label for="genUserPass1">Password</label></div>
									<div class="formRow"><input type="password" name="genUserPass1" id="genUserPass1" maxlength="200" /></div>
									<div class="formRow"><label for="genUserConfPass">Confirm Password</label></div>
									<div class="formRow"><input type="password" name="genUserConfPass" id="genUserConfPass" maxlength="200" /></div>
								</div>
								<div class="profileUserDetail leftBlock">
									<div class="formRow"><label for="genFullName">Full Name</label></div>
									<div class="formRow"><input type="text" name="genFullName" id="genFullName" maxlength="200"  value="<?php echo $objProfileDetails->fullname;?>" /></div>
									<div class="formRow"><label for="genUserDOB">Date Of Birth</label></div>
									<div class="formRow"><input type="text" name="genUserDOB" id="genUserDOB" maxlength="200"  value="<?php echo $objProfileDetails->dob;?>" /></div>
									<div class="formRow"><label for="genUserDOJ">Date Of Joining</label></div>
									<div class="formRow"><input type="text" readonly="readonly" disabled="disabled" name="genUserDOJ" id="genUserDOJ" maxlength="200"  value="<?php echo $objProfileDetails->doj;?>"/></div>
								</div>
								<div class="profileUserDetail leftBlock clearall">
									<div class="formRow"><label for="genAddress">Address</label></div>
									<div class="formRow"><textarea rows="6" cols="40" name="genAddress" id="genAddress" maxlength="500"  value="" ><?php echo $objProfileDetails->address;?></textarea></div>
									<div class="formRow"><label for="genUserPhone">Phone</label></div>
									<div class="formRow"><input type="text" name="genUserPhone" id="genUserPhone" maxlength="16"  value="<?php echo $objProfileDetails->phone;?>" /></div>
									<div class="formRow"><label for="genUserEmail">Email</label></div>
									<div class="formRow"><input type="text" name="genUserEmail" id="genUserEmail" maxlength="100"  value="<?php echo $objProfileDetails->email;?>" /></div>
								</div>
								
								<div class="profileUserDetail leftBlock profileBlock">
									<div class="formRow"><label for="genProfilePicture">Profile Picure</label></div>
									<div class="formRow"><input type="file" name="genProfilePicture" id="genProfilePicture" /></div>
									<div class="profileImgWrap"><img src="images/profilePic/noprofilepic.jpg" width="200" height="200" id="profileImg" /></div>
								</div>
								<div class="profileUserDetail clearall lngBlock">
									<div class="formRow"><label for="genLanguages">Languages</label></div>
									
									<?php  

										
										$objLangList	=	new languageProcessor();
										$reslang		=	$objLangList->getAllLanguages($arrDBTaskManagement);
										?>
										<ul>
										<?php
										while($objUserLang = mysql_fetch_object($reslang)){
										?>
											<li><input type="checkbox"  name="genUserLanguage[]" id="genUserLanguage" value="<?php echo $objUserLang->lid ?>" <?php echo (in_array($objUserLang->lid,$userlanguageList) == 1)?'checked="checked"':''; ?>><?php echo $objUserLang->language ?></input></li>
										<?php 
										}
										?>
										<ul>
										<div class="clearall"></div>
								</div>
								<div class="formRow">
									<input type="hidden" name="formsubmit" id="formsubmit1" value="1">
									<input type="hidden" id="hdn_genUserId" name="hdn_genUserId" value="<?php echo $objProfileDetails->uid;?>" />
									<input type="submit" name="genUserLogin" id="genUserLogin" value="Submit"/>
								</div>
								<div class="formRow"></div>
							</form>							
	</div>
	<div class="footer">
			<?php include("include/footer.php"); ?>
	</div>
</div>
</body>
</html>
